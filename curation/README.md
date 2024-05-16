# PAGE curation
#### last modified: ejr: 2021-06-16

## Procedure

Initial curation was performed using the annotation tool. [current version](https://sanchezalvarado.shinyapps.io/PAGE_annotator/). Due to unforseen requirements and ontology improvements the initial files required a variety of corrections. Curations were combined into a single file, which is then versioned as we add additional entries via submission as github issues.


Directory with original annotation Files: `curation/ExpressionFiles`  
Directory with correction information: `curation/manual_corrections`  
Script to join original annotation and correct: `curation/code/combined_and_correct_term_annotations.R` (no parameters)  
Script for adding new submissions: `curation/code/add_annotations.R` (submission file as only parameter)  


## Submission File format

tab-delimited w/ headers. (annotation app outputs correct format)

Valid values for fields are listed in: `curation/shiny_annotator/config.json`

Fields:  
* Accession - official accession for this sequence. (whatever is used in the publication)
* Term - Anantomy term associated with this sequence
* Experimental Evidence - ontology term describing type of evidence.
* Biotype - PLANA biotype
* Life Cycle Stage - PLANA lifecycle stage
* Specimen - ontology term describing source of material 
* Curator (ORCID) - format: 0000-0000-0000-0000
* Pubmed ID - id of publication containing annotation data
* Date - date of annotation. format: Wed Jun 16 18:35:49 2021

## Example

A new submission consisting of a text file generated by the annotation app is recieved on github.  This file is copied into `curation/submissions` and manual inspected to verify it is an actual text file, then `curation/code/add_annotations.R filename` is run.  If there are no errors this will created a new dated term_annotations file (e.g. erm_annotations_2021-06-15.txt.) When a new annotation file is accepted the symlink term_annotations.txt shoudl be updated to point to the accepted file. The script outputs a count of input accessions and the number of accessions that map to SMED3000x IDs. Not all genes are contained in SMED3000x, so this may not be a problem, but should be investigated.  


## Notes
 If demand is sufficient we might want additional validations, but most should be identified when term_annotations.txt is loaded into the ontology database.  