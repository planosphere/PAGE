#!/usr/bin/env Rscript
# Read in mapping file and annotations file and join them together
# ejr - 2020-02-24
# last modified: 2020-05-07
library(tidyverse)
library(here)

### INPUT
term_annots <- read_tsv(here("OUTPUT", "term_annotations.txt")) 
smest_map   <- read_tsv(here("OUTPUT", "smest_transcriptome_mapping.txt"))
smed3_map   <- read_tsv(here("OUTPUT", "smed_201401614_transcriptome_mapping.txt"))
smesg_map   <- read_tsv(here("OUTPUT", "smesg_transcriptome_mapping.txt"))

# join annotations and reference ids
smed3_joined <- term_annots %>% 
    left_join(smed3_map, by=c("Accession" = "seq_id")) 
smest_joined <- term_annots %>% 
    left_join(smest_map, by=c("Accession" = "seq_id")) 
smesg_joined <- term_annots %>% 
    left_join(smesg_map, by=c("Accession" = "seq_id")) 

### OUTPUT

write_tsv(smed3_joined, here("OUTPUT", "smed3_joined.txt"))
write_tsv(smest_joined, here("OUTPUT", "smest_joined.txt"))
write_tsv(smesg_joined, here("OUTPUT", "smesg_joined.txt"))

