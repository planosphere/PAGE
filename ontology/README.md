# Ontology files for PAGE search

Generated, never edited by hand. The GitHub Action `.github/workflows/plana-closure.yml`
downloads the published PLANA, BSPO and ECO every Monday and, when any of them has a new release,
rewrites the files below and commits them. To refresh by hand: Actions tab -> "PLANA closure" ->
Run workflow. Used by MOOP's PAGE search; replaces the Owlery and Blazegraph servers.

| File | What it holds |
|---|---|
| `plana-closure.tsv` | every relationship that follows from PLANA, at any depth: `subject  relation  object` |
| `eco-closure.tsv` | the same for ECO, so "any kind of in situ hybridization evidence" includes its subtypes |
| `plana-terms.tsv`, `bspo-terms.tsv`, `eco-terms.tsv` | `term  field  value`: label, exact / related / narrow / broad synonyms, definition, obsolete, replaced_by |
| `releases.txt` | which release of each ontology the files came from |
| `terms.rq`, `tidy_terms.py` | the query and the small script that make the `*-terms.tsv` files |

`plana-closure.tsv` includes links nobody wrote directly: `is a` through any number of levels,
`is a` combined with a relationship (A is a B, B part of C, so A part of C), chains of a
relationship, and links that follow from PLANA's logical definitions -- computed by
`relation-graph` in the same ODK image that builds PLANA.

Example row (cephalic ganglia, exact synonym "brain"):

    PLANA:0000044   exact_synonym   brain
