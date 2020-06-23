#!/usr/bin/perl
use strict;
use warnings;
use Digest::MD5 qw(md5 md5_hex md5_base64);

my $curations = shift; #/Users/smr/src/ontology/page/PKP/transcriptome_mapping/4_join_mapping_to_annot/term_annotations.txt
open CURATIONS, $curations or die "Can't open curations tab delimited file: $curations $!\n";

print '@prefix OBAN: <http://oban.org/oban/> .
@prefix OBO: <http://purl.obolibrary.org/obo/> .
@prefix PAGE: <http://planosphere.stowers.org/page/> .
@prefix PMID: <http://www.ncbi.nlm.nih.gov/pubmed/> .
@prefix a: <http://www.w3.org/1999/02/22-rdf-syntax-ns#type> .
@prefix dc: <http://purl.org/dc/elements/1.1/> .
@prefix oboInOwl: <http://www.geneontology.org/formats/oboInOwl> .
@prefix xsd: <http://www.w3.org/2001/XMLSchema#> .

';

while (my $line = <CURATIONS>){
  chomp $line;
  next if $line =~ /Accession\tTerm/;
  my ($accession,$termparts,$evidenceCode,$biotype_id,$life_stage_id,$specimen_id,$curator,$pmid,$date) = split "\t", $line;
  my ($term_id) = $termparts =~ /(\w+\:\S+)\:? ?\S*/;
  $term_id =~ s/:/_/;
  $term_id =~ s/:$//;
  $evidenceCode =~ s/:/_/;
  $biotype_id =~ s/:/_/;
  $life_stage_id =~ s/:/_/;
  $specimen_id =~ s/:/_/;
  next if $accession eq 'Accession';
  my $md5 = (md5_hex($line));

#OBO:OBI_0100051 specimen
#OBO:RO_0002490 existence overlaps
#OBO:RO_0002558 has evidence
#OBO:PLANA_0000021 biotype
print "PAGE:$md5 a OBAN:association;
  OBAN:association_has_object OBO:$term_id;
  OBAN:association_has_object_property OBO:RO_0002200;
  OBAN:association_has_subject \"$accession\";
  OBO:OBI_0100051 OBO:$specimen_id;
  OBO:RO_0002490 OBO:$life_stage_id;
  OBO:RO_0002558 OBO:$evidenceCode;
  OBO:PLANA_0000021 OBO:$biotype_id;
  dc:source PMID:$pmid;
  <http://www.geneontology.org/formats/oboInOwl#create_date> \"$date\";
  <http://www.geneontology.org/formats/oboInOwl#created_by> \"$curator\" .
\n";
}

__END__
PAGE:2a36e5c2540c24c830ea9506f904ee5a a OBAN:association;
  OBAN:association_has_object OBO:PLANA_0000103;
  OBAN:association_has_predicate OBO:RO_0002200;
  OBAN:association_has_subject "Clone";
  OBO:OBI_0100051 OBO:PLANA_0000136;
  OBO:RO_0002490 OBO:PLANA_0004504;
  OBO:RO_0002558 OBO:ECO_0001839;
  dc:source PMID:16033796;
  <http://www.geneontology.org/formats/oboInOwl#create_date> "Mon Nov 11 23:51:28 2019";
  <http://www.geneontology.org/formats/oboInOwl#created_by> "https://orcid.org/0000-0002-7535-4407" .

PAGE:9aebb4d11127ab07ee19a34050e754ad a OBAN:association;
  OBAN:association_has_object OBO:PLANA_0002109;
  OBAN:association_has_predicate OBO:RO_0002200;
  OBAN:association_has_subject "SmedASXL_019196";
  OBO:OBI_0100051 OBO:PLANA_0002138;
  OBO:RO_0002490 OBO:PLANA_0004504;
  OBO:RO_0002558 OBO:ECO_0000295;
  dc:source PMID:26114597;
  <http://www.geneontology.org/formats/oboInOwl#create_date> "Mon Dec 16 10:41:37 2019";
  <http://www.geneontology.org/formats/oboInOwl#created_by> "https://orcid.org/0000-0003-2569-1939" .
