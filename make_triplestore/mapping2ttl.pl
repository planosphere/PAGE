#!/usr/bin/perl
use strict;
use warnings;
use Digest::MD5 qw(md5 md5_hex md5_base64);


my $mapping_file = shift; #PKP/transcriptome_mapping/3_aliases/smed_20140614_mapping_table_with_aliases.txt
my $mapping_source = shift;

print '@prefix OBAN: <http://oban.org/oban/> .
@prefix OBO: <http://purl.obolibrary.org/obo/> .
@prefix PAGE: <http://planosphere.stowers.org/page/> .
@prefix PMID: <http://www.ncbi.nlm.nih.gov/pubmed/> .
@prefix a: <http://www.w3.org/1999/02/22-rdf-syntax-ns#type> .
@prefix dc: <http://purl.org/dc/elements/1.1/> .
@prefix xsd: <http://www.w3.org/2001/XMLSchema#> .

';

open MAP, $mapping_file or die "Can't open mapping file: $mapping_file $!\n";
<MAP>;
while (my $line = <MAP>){
  chomp $line;
  #seq_id	ref_id	transcriptome_id	alias_mod
  #dd_Smed_v4_10001_0_1	SMED30030721	dd_Smed_v4	original
  my ($acc,$ref,$accSource) = split "\t", $line;
  next if $ref eq '"NA"';
#  $ref=~s/;/|/g;
  my $md5 = (md5_hex($line));

print "PAGE:$md5 a OBAN:association;
  OBAN:association_has_subject \"$acc\";
  OBAN:association_has_object_property PAGE:has_mapping_reference_id;
  OBAN:association_has_object \"$ref\";
  PAGE:has_reference_source \"$mapping_source\";
  dc:source \"$accSource\" .
\n";
}
