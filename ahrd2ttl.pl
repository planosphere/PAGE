#!/usr/bin/perl
use strict;
use warnings;
use Digest::MD5 qw(md5 md5_hex md5_base64);


my $ahrd_file = shift; # /n/sci/SCI-003983-SBSMED/smed_20140614/AHRD/20200416/smed_20140614_20200416_AHRD.tsv

print '@prefix OBAN: <http://oban.org/oban/> .
@prefix OBO: <http://purl.obolibrary.org/obo/> .
@prefix PAGE: <http://planosphere.stowers.org/page/> .
@prefix description: <http://purl.obolibrary.org/obo/IAO_0000115> .
@prefix a: <http://www.w3.org/1999/02/22-rdf-syntax-ns#type> .
@prefix dc: <http://purl.org/dc/elements/1.1/> .
@prefix xsd: <http://www.w3.org/2001/XMLSchema#> .

';

open AHRD, $ahrd_file or die "Can't open mapping file: $ahrd_file $!\n";
<AHRD>;
<AHRD>;
<AHRD>;
while (my $line = <AHRD>){
  chomp $line;
#Protein-Accession	Blast-Hit-Accession	AHRD-Quality-Code	Human-Readable-Description	Interpro-ID (Description)	Gene-Ontology-Term
#SMED30013155			Unknown protein
#SMED30013154			Unknown protein
#SMED30013157	tr|A0A564YVJ6|A0A564YVJ6_HYMDI	*-*	KH domain-containing protein		GO:0003676, GO:0003723, GO:0016020, GO:0016021
  my @line = split "\t", $line;
  my $acc = $line[0];
  my $desc = $line[3];
  my $md5 = (md5_hex($line));

print "PAGE:$md5 a OBAN:association;
  OBAN:association_has_subject \"$acc\";
  OBAN:association_has_object_property description: ; 
  OBAN:association_has_object \"$desc\";
  dc:source \"AHRD\" ;
  <http://www.geneontology.org/formats/oboInOwl#create_date> \"2020-04-16\" .
\n";
}
