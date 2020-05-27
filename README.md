## PAGE: web code
PHP and HTML for PAGE searches on Planosphere 

## PAGE: Make RDF Triplestore
Code for transforming curation and mapping data into a tripal store.
### data transformation (tab -> ttl)

Our curations were collected with a shiny app (will get its own repository soon). The curations are in tab delimited format. A perl script curations2ttl.pl transforms the tab-delimited curations from the shiny app into turtle format (ttl) following guidelines from [Open Biomedical Associations (OBAN)](https://github.com/EBISPOT/OBAN). Turtle format is a common format to store triples that are used to load into a triple store.

We mapped all transciptomes we came across in our reading of the plananrian literature to the SMED300XXXXX transcripts (smed_20140614) and to the dd_g4 gene model transcripts (smest). This mapping was performed using our RosettaStone mapping code (will get its own repository soon). The mappings were transformed into turtle format with a perl script, mappings2ttl.pl to be loaded into our triple store.

#### transform curations into turtle format
```
perl curations2ttl.pl term_annotations.txt > page.ttl 
```

#### transform mapping into turtle format
```
perl mapping2ttl.pl smed_20140614_mapping_table_with_aliases.txt smed_20140614 > smed_20140614_mapping.ttl 
perl mapping2ttl.pl  SMESG_dd_Smes_v2 > smesg_mapping.ttl 
```

### data storage: triple store
data was written to a Blazegraph jnl file using [blazegraph-runner](https://github.com/balhoff/blazegraph-runner)

#### load the gene-tissue curation triples, page.ttl
```
blazegraph-runner load --journal=blazegraph.jnl --informat=turtle --graph='http://planosphere.stowers.org/data' page.ttl
```

#### Load the RosettaStone mapped transcripts in turtle format (mapping.ttl)
blazegraph-runner load --journal=blazegraph.jnl --informat=turtle --graph='http://planosphere.stowers.org/data' mapping.ttl

#### Load Planarian Anatomy Ontology [PLANA](https://www.ebi.ac.uk/ols/ontologies/plana)
```
blazegraph-runner load --journal=blazegraph.jnl --informat=rdfxml --graph='http://purl.obolibrary.org/obo/plana.owl' ~/src/ontology/master-obophenotype/20190802/planaria-ontology/src/ontology/plana.owl
```

#### Load the Evidence & Conclusion Ontology [ECO](https://www.ebi.ac.uk/ols/ontologies/eco)
```
blazegraph-runner load --journal=blazegraph.jnl --informat=rdfxml --graph='http://purl.obolibrary.org/obo/eco.owl' eco.owl
```
