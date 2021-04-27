# PAGE
Planarian Anatomy Gene Expression Database

We manually curated the anatomical location of gene expression from publically available publications. In this respository we have our curation rules, our PAGE web code, our PAGE triplestore conversion code, our manual curations, as well as the tool we used to help us record our expression records.

## PAGE: Curation Rules
We docmented the [rules](curation_rules.md) we used while reading and looking for expression records (X transcript is expressed in Y location).  Read our curation [rules](curation_rules.md).

## PAGE: Curations
Our [raw curations](curation/ExpressionFiles/), any [manual edits](curation/manual_corrections), our [cleaned curations](curation/OUTPUT), and [code for cleaning](curation/code/) are available. We also have the code for the [shiny app](curation/shiny_annotator) that was used for collecting expression records. 

## PAGE: Web Code
The PHP and HTML [code](web_code) that we use on Planosphere for our PAGE searches are found in this repository. 

## PAGE: Make RDF Triplestore
The [code](make_triplestore) for transforming curation and mapping data into a tripal store.

## Contribute thoughts or curations
Visit the [issue tracker](https://github.com/planosphere/PAGE/issues/new/choose) and create a bug report, feature request, add questions or comments, add curations, or request a publication to be curated.


