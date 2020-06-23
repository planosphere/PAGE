#!/usr/bin/perl

######################################################################
# This is an automatically generated script to run your query.
# To use it you will require the InterMine Perl client libraries.
# These can be installed from CPAN, using your preferred client, eg:
#
#    sudo cpan Webservice::InterMine
#
# For help using these modules, please see these resources:
#
#  * https://metacpan.org/pod/Webservice::InterMine
#       - API reference
#  * https://metacpan.org/pod/Webservice::InterMine::Cookbook
#       - A How-To manual
#  * http://intermine.readthedocs.org/en/latest/web-services
#       - General Usage
#  * http://iodoc.labs.intermine.org
#       - Reference documentation for the underlying REST API
#
######################################################################

use strict;
use warnings;

# Set the output field separator as tab
$, = "\t";
# Print unicode to standard out
binmode(STDOUT, 'utf8');
# Silence warnings when printing null fields
no warnings ('uninitialized');

# This code makes use of the Webservice::InterMine library.
# The following import statement sets PlanMine as your default
use Webservice::InterMine 0.9904 'http://planmine.mpi-cbg.de/planmine';

my $query = new_query(class => 'Contig');

# The view specifies the output columns
$query->add_view(qw/
    gene.primaryIdentifier
    gene.transcripts.primaryIdentifier
    gene.description
/);

# Your custom sort order is specified with the following code:
$query->add_sort_order('gene.description', 'ASC');


# Use an iterator to avoid having all rows in memory at once.
my $it = $query->iterator();
while (my $row = <$it>) {
    print $row->{'gene.primaryIdentifier'}, $row->{'gene.transcripts.primaryIdentifier'},
        $row->{'gene.description'}, "\n";
}
