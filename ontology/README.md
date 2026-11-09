# PLANA relationship closure

`plana-closure.tsv` lists every relationship that follows from PLANA, at any depth:
one row per link, `subject  relation  object`, e.g.

    PLANA:0000044   BFO:0000050   PLANA:0000105     (cephalic ganglia  part of  ...)

It includes links nobody wrote directly: `is a` through any number of levels, `is a`
combined with a relationship (A is a B, B part of C, so A part of C), chains of a
relationship, and links that follow from PLANA's logical definitions.

**It is generated, never edited by hand.** The GitHub Action
`.github/workflows/plana-closure.yml` downloads the published `plana.owl` weekly and, when
PLANA has a new release, recomputes this file with `relation-graph` (in the same ODK
image that builds PLANA) and commits it. `plana-release.txt` records which release it came from.

Used by MOOP's PAGE search ("expressed in any part of X"), replacing the Owlery server.
To refresh by hand: Actions tab -> "PLANA closure" -> Run workflow.
