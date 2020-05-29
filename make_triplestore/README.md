# PAGE: Make RDF Triplestore
Code for transforming curation and mapping data into a tripal store.
## data transformation (tab -> ttl)

Our curations were collected with a shiny app, [Shiny Annotator](../curation/shiny_annotator). The curations are in tab delimited format. A perl script curations2ttl.pl transforms the tab-delimited curations from the Shiny Annotator output into turtle format (ttl) following guidelines from [Open Biomedical Associations (OBAN)](https://github.com/EBISPOT/OBAN). Turtle format is a common format to store triples that are used to load into a triple store.

We mapped all transciptomes we came across in our reading of the plananrian literature to the SMED300XXXXX transcripts (smed_20140614) and to the dd_smes_v2 gene model transcripts (smest). This mapping was performed using our [Rosetta Stone Tramscript Mapping code](https://github.com/planosphere/RosettaStone). The mappings were transformed into turtle format with a perl script, mappings2ttl.pl to be loaded into our triple store.

### transform curations into turtle format
```
perl curations2ttl.pl term_annotations.txt > page.ttl 
```

### transform mapping into turtle format
```
awk -F "\t" {'print $1"\t"$5"\t"$3'} smed_and_smesgs_mapping.txt > smesg_mapping.txt
perl mapping2ttl.pl smesg_mapping.txt SMESG_dd_Smes_v2 > smesg_mapping.ttl
perl mapping2ttl.pl smed_20140614_transcriptome_mapping.txt smed_201401614 > smed_20140614_mapping.ttl
perl mapping2ttl.pl smest_transcriptome_mapping.txt  SMEST_dd_Smes_v2 > smest_mapping.ttl
```

## data storage: triple store
data was written to a Blazegraph jnl file using [blazegraph-runner](https://github.com/balhoff/blazegraph-runner)

### load the sequenceID-planaTerm curation triples, page.ttl
```
blazegraph-runner load --journal=blazegraph.jnl --informat=turtle --graph='http://planosphere.stowers.org/data' page.ttl
```

### Load the Rosetta Stone mapped transcripts (ttl) into jnl
```
blazegraph-runner load --journal=blazegraph.jnl --informat=turtle --graph='http://planosphere.stowers.org/data' smed_20140614_mapping.ttl
blazegraph-runner load --journal=blazegraph.jnl --informat=turtle --graph='http://planosphere.stowers.org/data' smesg_mapping.ttl
blazegraph-runner load --journal=blazegraph.jnl --informat=turtle --graph='http://planosphere.stowers.org/data' smest_mapping.ttl
```

### Get sequence descriptions and convert to ttl
```
perl getPlanmineDesc.pl > planmine.desc.txt
perl planmineDesc2ttl.pl planmine_desc.txt > planmine.descriptions.ttl
curl -OL https://planosphere.stowers.org/pub/gff/smed_20140614.ontology.dbxref.ahrd.page.gff
perl gffName2ttl.pl smed_20140614.ontology.dbxref.ahrd.page.gff  > smed_20140614.descriptions.ttl
```

### Load the Sequence Descriptions
```
blazegraph-runner load --journal=blazegraph.jnl --informat=turtle --graph='http://planosphere.stowers.org/data' smed_20140614.descriptions.ttl
blazegraph-runner load --journal=blazegraph.jnl --informat=turtle --graph='http://planosphere.stowers.org/data' planmine.descriptions.ttl
```

### Load Planarian Anatomy Ontology [PLANA](https://www.ebi.ac.uk/ols/ontologies/plana)
```
curl -OL http://purl.obolibrary.org/obo/plana.owl
blazegraph-runner load --journal=blazegraph.jnl --informat=rdfxml --graph='http://purl.obolibrary.org/obo/plana.owl' plana.owl
```

### Load the Evidence & Conclusion Ontology [ECO](https://www.ebi.ac.uk/ols/ontologies/eco)
```
curl -OL http://purl.obolibrary.org/obo/eco.owl
blazegraph-runner load --journal=blazegraph.jnl --informat=rdfxml --graph='http://purl.obolibrary.org/obo/eco.owl' eco.owl
```
