#!/usr/bin/env Rscript
# ejr: 2021-06-16
# add annotations to PAGE from submission files

library(tidyverse)
library(lubridate)
library(here)


v <- function(...) cat(sprintf(...), sep='', file=stderr())

args <- commandArgs(trailingOnly = TRUE)

# Read in new annotations

#filename <- here("submissions", "24737865_0000-0003-2569-1939_2021-06-16.txt")
filename = args[1]
new_annots <- read_tsv(filename, col_types = cols()) %>%
    mutate(Date = date(as.Date(Date, "%a %b %d %T %Y")))

# are accessions in mapping file")
download.file("https://raw.githubusercontent.com/planosphere/RosettaStone/master/mapping_tables/2020/smed_20140614_transcriptome_mapping.txt.gz", destfile=here("tmp", "smed_20140614_transcriptome_mapping.txt.gz"))
acc2smed <- read_tsv(here("tmp", "smed_20140614_transcriptome_mapping.txt.gz"), col_types = cols()) %>%
    rename(Accession = seq_id)

# join new annotations to map file
# output error if they do not map
maptest <- new_annots %>% left_join(acc2smed) %>% filter(! is.na(ref_id))

num_new_accessions <- length(unique(new_annots$Accession))
num_mapped_accessions <- length(unique(maptest$Accession))

v("There are %d new accessions. %d map to SMED3000 ids.\n", num_new_accessions, num_mapped_accessions)
# Read in most recent annotation file
# this file is a symbolic link to the most recent file.
annots <- read_tsv(here("OUTPUT", "term_annotations.txt"), col_types = cols())

updated_annots <- rbind(annots, new_annots)

# OUTPUT
write_tsv(updated_annots, here("OUTPUT", paste0("term_annotations_", today(), ".txt")))
