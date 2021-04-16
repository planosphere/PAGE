#!/usr/bin/perl
use strict;
use warnings;
use Digest::MD5 qw(md5 md5_hex md5_base64);


my $desc_file = shift; # /n/sci/SCI-003983-SBSMED/smed_20140614/AHRD/20200416/smed_20140614_20200416_AHRD.tsv

print '@prefix OBAN: <http://oban.org/oban/> .
@prefix OBO: <http://purl.obolibrary.org/obo/> .
@prefix PAGE: <http://planosphere.stowers.org/page/> .
@prefix description: <http://purl.obolibrary.org/obo/IAO_0000115> .
@prefix a: <http://www.w3.org/1999/02/22-rdf-syntax-ns#type> .
@prefix dc: <http://purl.org/dc/elements/1.1/> .
@prefix xsd: <http://www.w3.org/2001/XMLSchema#> .

';

my %desc;
open DESC, $desc_file or die "Can't open mapping file: $desc_file $!\n";
#SMESG000000001.1	INHBE	SMEST000001001.1	inhibin beta E
#SMESG000000003.1	NARS2	SMEST000003001.1	asparaginyl-tRNA synthetase 2 (mitochondrial)(putative)
#SMESG000000010.1		SMEST000010001.1
#SMESG000000013.1	UBE4B	SMEST000013001.1	ubiquitination factor E4B
#SMESG000000017.1		SMEST000017001.1
#SMESG000000022.1	SVOP	SMEST000022001.1	SV2 related protein homolog (rat)
#SMESG000000023.1		SMEST000023001.1
#SMESG000000025.1	ACP6	SMEST000025001.1	acid phosphatase 6, lysophosphatidic

while (my $line = <DESC>){
  chomp $line;
  my @line = split "\t", $line;
  my $gene = $line[0];
  my $transcript = $line[2];
  my $desc = $line[3] ? $line[3] : 'none';
  $desc{$gene}=$desc;
  $desc{$transcript}=$desc;
}

foreach my $id (keys %desc){
  my $desc = $desc{$id};
  my $md5 = (md5_hex("$id\t$desc"));

print "PAGE:$md5 a OBAN:association;
  OBAN:association_has_subject \"$id\";
  OBAN:association_has_object_property description: ; 
  OBAN:association_has_object \"$desc\";
  dc:source \"Planmine\" ;
  <http://www.geneontology.org/formats/oboInOwl#create_date> \"2021-04-08\" .
\n";
}
# creation times
#  <http://www.geneontology.org/formats/oboInOwl#create_date> \"2020-05-20\" .
