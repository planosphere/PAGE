#!/usr/bin/env Rscript
# clean text files of anatomy annotations
# files were generated from SHINY app here: /n/sci/SCI-003663-PKP/anatomy_ontology_assignment_app
# directory contains many text files, mostly corresponding to individual pubs

# 1. read in files
# 2. identify data entry errors
# 3. identify duplicate annotatations


# run this is a directory with a subdirectory called "manual_corrections"

library(data.table)
library(stringr)
library(here)
library(tidyverse)


# directory of text files from shiny app
data_dir <- "ExpressionFiles/"
file_list <- list.files(path=data_dir, pattern="*.txt")                              

# read into data.frame
annots <- do.call("rbind", lapply(file_list, function(x) ({
                            fread(paste(data_dir, x, sep=''), colClasses = c(rep("character", 9)))
                        }))
            ) 


# INITIAL DATA CLEANING
# a few accessions have spaces in them.
terms <- annots %>%
    mutate(Accession = str_replace_all(Accession, "\\s", ""))



##### FROM Erin and Steph
# corrected accessions
# Sofia wants all "ß" to "beta".  This was fixed with accession replacement.
corr_acc <- read_tsv(here("manual_corrections", "corrected_accessions.txt"), col_types="ccc")
terms_acc <- left_join(terms, corr_acc) %>% 
    mutate(Accession = ifelse(!is.na(new_accession), new_accession, Accession)) %>%
    select(-new_accession)

# corrected pubmed ids
corr_pmid <- read_tsv(here("manual_corrections", "corrected_pubmed_ids.txt"))
terms_acc_pmid <- left_join(terms_acc, corr_pmid, by=c("Accession"="Accession")) %>% 
    mutate(PMID = ifelse(!is.na(new_PMID), new_PMID, PMID)) %>%
    select(-new_PMID)
#####

##### From Sofia
# corrected ontology terms
# and replce bad experimental exidence term
corr_terms <-  read_tsv(here("manual_corrections", "corrected_terms.txt"))
terms_acc_pmid_terms <- left_join(terms_acc_pmid, corr_terms, by=c("Term" = "old_term"))%>% 
    mutate(Term = ifelse(!is.na(new_term), new_term, Term)) %>%
    mutate(`experimental evidence` = ifelse(`experimental evidence` == "ECO:0000104", "ECO:0000097", `experimental evidence`)) %>%
    select(-new_term)


# we are replacing user initials with ORCIDs
corr_orcids <- read_tsv(here("manual_corrections",  "corrected_orcids.txt"))
terms_acc_pmid_terms_orcid <- left_join(terms_acc_pmid_terms, corr_orcids, by=c("Curator (SIMR id)" = "curator"))%>% 
    mutate(`Curator (SIMR id)` = ifelse(!is.na(orcid),orcid, `Curator (SIMR id)`)) %>%
    select(-orcid)    
#####


# annots to delete
#containing BSPO:0000080: dorso-lateral region (Synonym = dorsolateral region (16 annots)
#anything with Stage \d’   
delete_list<- read_tsv(here("manual_corrections", "delete_entries.txt"), col_types="ccc") %>%
    mutate(delete = TRUE)

terms_acc_pmid_terms_orcid_del <- terms_acc_pmid_terms_orcid %>%
    filter(Term != "BSPO:0000080: dorso-lateral region (Synonym = dorsolateral region") %>%
    filter(! str_detect(Term, "Stage ")) %>%
    left_join(delete_list) %>%
    filter(is.na(delete)) %>%
    select(-delete)


# OUTPUT
write_tsv(terms_acc_pmid_terms_orcid_del, here("OUTPUT", "term_annotations.txt"))

