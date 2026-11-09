#!/usr/bin/perl
use strict;
use warnings;
use Digest::MD5 qw(md5 md5_hex md5_base64);


my $geneName_file = shift; # /n/sci/SCI-003983-SBSMED/schMedS3/analysis/orthologs/wbps19/OMA.2.6.0/OMA.2.6.0/ortholog_table/geneNames.HUMAN.DROME.txt

print '@prefix OBAN: <http://oban.org/oban/> .
@prefix OBO: <http://purl.obolibrary.org/obo/> .
@prefix PAGE: <http://planosphere.stowers.org/page/> .
@prefix description: <http://purl.obolibrary.org/obo/IAO_0000115> .
@prefix a: <http://www.w3.org/1999/02/22-rdf-syntax-ns#type> .
@prefix dc: <http://purl.org/dc/elements/1.1/> .
@prefix xsd: <http://www.w3.org/2001/XMLSchema#> .

';

open NAMES, $geneName_file or die "Can't open mapping file: $geneName_file $!\n";
while (my $line = <NAMES>){
  chomp $line;
  
  my @line = split "\t", $line;
  my $acc = $line[0];
  my $desc = $line[2];
  my $symbol = $line[3];
  next if $desc =~ /^$/;
  next if $acc eq 'id';
  my $md5 = (md5_hex($line));

print "PAGE:$md5 a OBAN:association;
  OBAN:association_has_subject \"$acc\";
  OBAN:association_has_object_property description: ; 
  OBAN:association_has_object \"$desc\";
  dc:source \"OMA-UNIPROT\" ;
  <http://www.geneontology.org/formats/oboInOwl#create_date> \"2024-05-23\" .
\n";
}
