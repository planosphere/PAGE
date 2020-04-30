# PAGE Data transformtion

## data transformation

Our curations were collected with a shiny app (will get its own repository soon). The curations are in tab delimited format. A perl script curations2ttl.pl transforms the tab-delimited curations from the shiny app into turtle format (ttl) following guidelines from [Open Biomedical Associations (OBAN)](https://github.com/EBISPOT/OBAN). Turtle format is a common format to store triples that are used to load into a triple store.

We mapped all transciptomes we came across in our reading of the plananrian literature to the SMED300XXXXX transcripts (smed_20140614) and to the dd_g4 gene model transcripts (smest). This mapping was accomplised using our RosettaStone mapping code (will get its own repository soon). The mappings were transformed into turtle format with a perl script, mappings2ttl.pl to be loaded into our triple store.

### transform curations into turtle format
```
perl curations2ttl.pl term_annotations.txt > page.ttl 
```

### transform mapping into turtle format
```
perl mapping2ttl.pl smed_20140614_mapping_table_with_aliases.txt > mapping.ttl 
```

## data storage: triple store
data was written to a Blazegraph jnl file using [blazegraph-runner](https://github.com/balhoff/blazegraph-runner)

### load the gene-tissue curation triples, page.ttl
```
blazegraph-runner load --journal=blazegraph.jnl --informat=turtle --graph='http://planosphere.stowers.org/data' page.ttl
```

### load mapping.ttl
blazegraph-runner load --journal=blazegraph.jnl --informat=turtle --graph='http://planosphere.stowers.org/data' mapping.ttl

### load plana.owl
```
blazegraph-runner load --journal=blazegraph.jnl --informat=rdfxml --graph='http://purl.obolibrary.org/obo/plana.owl' ~/src/ontology/master-obophenotype/20190802/planaria-ontology/src/ontology/plana.owl
```

### load the evidence code ontology
```
blazegraph-runner load --journal=blazegraph.jnl --informat=rdfxml --graph='http://purl.obolibrary.org/obo/eco.owl' eco.owl
```
