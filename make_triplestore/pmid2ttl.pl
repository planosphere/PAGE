#!/usr/bin/perl
use strict;
use warnings;
use Data::Dumper;
use Digest::MD5 qw(md5 md5_hex md5_base64);

my $pmid_info = 'pmid_data.txt';
open PMC , $pmid_info  or die "Cannot open $pmid_info\n";
my %PMIDs;
my $pmid = '';
while (my $line = <PMC>){
  chomp $line;
  if ($line =~ /^PMID\-\s*(\d+)/){
    # new record;
    $pmid = $1;
  }elsif($line =~ /^DP\s*\-\s*(\d+)/){
    $PMIDs{$pmid}{YR}=$1;
  }elsif($line =~ /^TI\s*\-\s*(\.+)$/){
    $PMIDs{$pmid}{TI}=$1;
    $line = <PMC>;
    while ($line =~ /^\s+(\.+)$/){
      $PMIDs{$pmid}{TI} .= " " . $1;
      $line = <PMC>;
    }
  }
  if($line =~ /^AB\s*\-\s*(.+)$/){
    $PMIDs{$pmid}{AB}=$1;
    $line = <PMC>;
    while ($line =~ /^\s+(.+)$/){
      $PMIDs{$pmid}{AB} .= " " . $1;
      $line = <PMC>;
    }
  }
  if($line =~ /^AU\s*\-\s*(.+)$/){
     push @{$PMIDs{$pmid}{AU}} , $1;
  }
  if($line =~ /^JT\s*\-\s*(.+)$/){
    $PMIDs{$pmid}{JT}=$1;
  }
  if($line =~ /^SO\s*\-\s*(.+)$/){
    $PMIDs{$pmid}{SO}=$1;
    $line = <PMC>;
    while ($line =~ /^\s+(.+)$/){
      $PMIDs{$pmid}{SO} .= " " . $1;
      $line = <PMC>;
    }
  }
}

#print Dumper \%PMIDs;

print '@prefix OBAN: <http://oban.org/oban/> .
@prefix OBO: <http://purl.obolibrary.org/obo/> .
@prefix PAGE: <http://planosphere.stowers.org/page/> .
@prefix PMID: <http://www.ncbi.nlm.nih.gov/pubmed/> .
@prefix a: <http://www.w3.org/1999/02/22-rdf-syntax-ns#type> .
';


foreach my $pmid (keys %PMIDs){
  my $au = ${$PMIDs{$pmid}{AU}}[0];
  $au =~ s/(.+)\s+\S+$/$1/;
  my $etal = @{$PMIDs{$pmid}{AU}} > 1 ? ' et al.,' : '';
  my $yr = $PMIDs{$pmid}{YR};
  my $citation = "$au$etal $yr";
  my $pmid_citation = "$pmid: $citation";
  my $md5 = (md5_hex($pmid_citation));


#OBO:IAO_0000301 citation
print "PAGE:$md5 a OBAN:association;
  OBAN:association_has_object PMID:$pmid;
  OBAN:association_has_object_property OBO:IAO_0000301;
  OBAN:association_has_subject \"$citation\".
\n";
}

