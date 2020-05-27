#!/usr/bin/perl
use strict;
use warnings;
use Digest::MD5 qw(md5 md5_hex md5_base64);


my $gff_file = shift; #/n/sci/SCI-003663-PKP/smr_page/smed_20140614.ontology.dbxref.ahrd.page.gff

print '@prefix OBAN: <http://oban.org/oban/> .
@prefix OBO: <http://purl.obolibrary.org/obo/> .
@prefix PAGE: <http://planosphere.stowers.org/page/> .
@prefix description: <http://purl.obolibrary.org/obo/IAO_0000115> .
@prefix a: <http://www.w3.org/1999/02/22-rdf-syntax-ns#type> .
@prefix dc: <http://purl.org/dc/elements/1.1/> .
@prefix xsd: <http://www.w3.org/2001/XMLSchema#> .

';

open GFF, $gff_file or die "Can't open mapping file: $gff_file $!\n";
while (my $line = <GFF>){
  next if $line =~ /^#/;
  chomp $line;
#head /n/sci/SCI-003663-PKP/smr_page/smed_20140614.ontology.dbxref.ahrd.page.gff
#SMED30000001	smed_20140614	transcript	1	2427	.	.	.	ID=SMED30000001;Name=HTH CENPB-type domain-containing protein;ahrd_human_readable_description=HTH CENPB-type domain-containing protein;Ontology_term=GO:0003676,GO:0003677;
#SMED30000002	smed_20140614	transcript	1	428	.	.	.	ID=SMED30000002;Name=DDE-1 domain-containing protein;ahrd_human_readable_description=DDE-1 domain-containing protein;Ontology_term=GO:0003676;
#SMED30007406    smed_20140614   transcript      1       2730    .       .       .       ID=SMED30007406;Name=SMEDWI-1;Alias=piwi-1;Ontology_term=PLANA:0000002,PLANA:0000003,PLANA:0000004,PLANA:0000005,PLANA:0000006,PLANA:0000007,PLANA:0000008,PLANA:0000014,PLANA:0000074,PLANA:0000208,PLANA:0000212,PLANA:0000420,PLANA:0000429,PLANA:0002013,PLANA:0002075,PLANA:0002089,PLANA:0002109,PLANA:0002111,PLANA:0002142,PLANA:0004517;Dbxref=GenBank:Q2Q5Y9,SmedGD GBrowse:SMED30007406;genbank_definition=SMEDWI-1;
  my ($acc) = $line =~ /ID=([^;]+)/;
  my $desc;
  my $source;
  if ( $line =~ /genbank_definition=([^;]+)/ ){
    $desc = $1;
    $source = 'Genebank';
  }else{
    $line =~ /ahrd_human_readable_description=([^;]+)/;
    $desc = $1;
    $source = 'AHRD';
  }
  my $md5 = (md5_hex("$acc\t$desc"));

print "PAGE:$md5 a OBAN:association;
  OBAN:association_has_subject \"$acc\";
  OBAN:association_has_object_property description: ; 
  OBAN:association_has_object \"$desc\";
  dc:source \"$source\" . 
\n";
}
