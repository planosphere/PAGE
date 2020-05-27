<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <title>PAGE</title>

<style type="text/css">
 .node-title {
    display: none;
}
#outer
{
     width:50%;
    text-align: left;
}
.inner
{
    display: inline-block;
}
.first-column {
    width: 66%;
    padding: 0 10px 0 0;
    float: left;
}

.second-column {
    width: 33%;
    padding: 0 10px 0 0;
    float: right;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.5/handlebars.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/0.11.1/typeahead.bundle.min.js"></script>
<script src="/pub/OLS/OLS-autocomplete/build/ols-autocomplete.js"></script>


</head>
<body>
<div id="searchform" class="row">
<div class="first-column">
<h2 style="color:#32821f;font-size:1.9em;font-family:oswaldregular">Identify transcripts expressed in anatomical structures as reported in planarian community publications</h2> <hr>



<?php

$c1 = '

<div style="font-size:1.2em">Search for all transcripts that are expressed in an anatomical structure or a specific area of <em>S. meditteranea</em>. The search can be modified to include other structures that are of the same type (<u>is a</u>) or only anatomical structures that are <u>part of</u>, <u>contained in</u>, or <u>develops from</u> your search term.
The terms and their relationships to other terms are defined in the Planarian Anatomy Ontology. To better understand terms and their relationships, browse the ontology here on <a style="color:#32821f;" href="https://planosphere.stowers.org/ontology">Planosphere</a> or at EBI <a style="color:#32821f;" href="https://www.ebi.ac.uk/ols/ontologies/plana">OLS</a>.
<br><br><a style="color:#32821f;" href="/search/page/about">Read more about PAGE</a></div>
<hr>

';
print theme(
  'ctools_collapsible',
  array(
    'handle' => '<h2 style="font-size:1.2em;">Click for more information about this PAGE Search</h2>',
    'content' => $c1,
    'collapsed' => TRUE
  )
);

print("<p></p>");


$c2 = '

<div style="position: relative;left: 10px;font-size:1.2em">
 <ul>
   <li>Transcripts associated with any anatomical term that <u>is a</u> <a style="color:#32821f;" href="/ontology/PLANA_0000429">neoblast</a> (<em>will return transcripts associated with zeta-neoblasts etc.</em>)</li>
   <li>Transcripts associated with anatomical term(s) that are <u>exactly</u> curated as a <a  style="color:#32821f;" href="/ontology/PLANA_0000429">neoblast</a> (<em>will return transcripts associated only with neoblast</em>)</li>
   <li>Transcripts associated with any anatomical term that is <u>part of</u> the <a  style="color:#32821f;" href="/ontology/PLANA_0000103">central nervous system</a> (<em><u>part of</u> relates organelles to organ systems and does NOT relate to large body regions. This will return transcripts associated with the optic chiasma etc.</em>)</li>
   <li>Transcripts associated with any anatomical term that is <u>contained in</u> the <a  style="color:#32821f;" href="ontology/PLANA_0000142">posterior region of the whole animal</a> (<em><u>contained in</u> relates anatomical structures to large body regions and does NOT relate scalar anatomical entities like cells to tissues etc. This will return transcripts in the postpharyngeal region, tail, tail tip, etc.</em>)</li>
   <li>Transcripts associated with any anatomical term that <u>develops from</u> a <a  style="color:#32821f;" href="/ontology/PLANA_0000429">neoblast</a> (<em>will return transcripts in the germline stem cells, oogonial stem cell, etc.</em>)</li>
 </ul>


</div>

';

print theme(
  'ctools_collapsible',
  array(
    'handle' => '<h2 style="font-size:1.2em;">Click for search tips</h2>',
    'content' => $c2,
    'collapsed' => TRUE
  )
);

print("<p></p>");

?>





<hr>
<div class="grid_10 omega" style="margin-left:30px">
   <h2 style="font-size:1.9em;font-family:oswaldregular">Select an anatomical term:</h2>
                <form method="post">  
                    <fieldset>
<div class="just_this_ols">
    <style scoped>
        @import "/pub/OLS/OLS-autocomplete/css/ols-colors.css";
        @import "/pub/OLS/OLS-autocomplete/css/ols.css";
        @import "/pub/OLS/OLS-autocomplete/css/bootstrap.css";
        @import "/pub/OLS/OLS-autocomplete/css/typeaheadjs.css";

    </style>
                        <label>
 <input style="font-weight: normal" size="35" type="text"  name="q" data-olswidget="select" data-olsontology="plana" data-selectpath="https://www.ebi.ac.uk/ols/"  id="local-searchbox" placeholder="Find term in list" ></input><div style="font-family=Oswald;font-weight: 300;font-style: normal;"> Start typing. Once you complete a few characters of a PLANA term, a list will appear. You must select one of these autocomplete terms for the search to function. Try 'neoblast' or 'cephalic ganglia'
</div>
                        </label>
</div>
                    <h2 style="font-size:1.9em;font-family:oswaldregular">Search for transcripts expressed in:</h2> 

<div>
<br><label for="searchType">Search Type</label><br>
<select id="searchType" name="searchType">
  <option value="is_a">is a: any anatomical term that is a [Your Search Term]</option>
  <option value="exact">exact:  only the anatomical term that is exactly [Your Search Term] </option>
  <option value="part_of">part of: any anatomical term that is part_of [Your Search Term]</option>
  <option value="contained_in">contained in: any anatomical term that is contained_in [Your Search Term]</option>
  <option value="develops_from">develops from:  any anatomical term that develops_from [Your Search Term]</option>
</select>
<div style="font-family=Oswald;font-weight: 300;font-style: normal;">Try searching for transcripts that are expressed in any structure that is 'part of' the 'cephalic ganglia' (select 'cephalic ganglia' above and 'part of' here).</div>
<div style="font-family=Oswald;font-weight: 300;font-style: normal;">Try searching for transcripts that are expressed in any structure that is 'contained in' the 'head' (select 'head' above and 'contained in' here).</div>
</div>

<div>
<br><label for="specimenType">Specimen Type</label><br>
<select id="specimenType" name="specimenType">
  <option value="any">any</option>
  <option value="PLANA_0000136">whole organism</option>
  <option value="PLANA_0002138">FACS sorted cell population</option>
</select>
<div style="font-family=Oswald;font-weight: 300;font-style: normal;">Try limiting your search to only FACS sorted cells.</div>
</div>
<div>
<br><label for="lifecycleType">Life Cycle</label><br>
<select id="lifecycleType" name="lifecycleType">
  <option value="any">any</option>
 <option value="PLANA_0004503">adult hermaphrodite</option>
  <option value="PLANA_0004504">asexual adult</option>
  <option value="PLANA_0000214">juvenile</option>
  <option value="UBERON_0000068">embryo stage</option>
  <option value="PLANA_0000002">--Stage 2</option>
  <option value="PLANA_0000003">--Stage 3</option>
  <option value="PLANA_0000004">--Stage 4</option>
  <option value="PLANA_0000005">--Stage 5</option>
  <option value="PLANA_0000006">--Stage 6</option>
  <option value="PLANA_0000007">--Stage 7</option>
  <option value="PLANA_0000008">--Stage 8</option>
</select>
<div style="font-family=Oswald;font-weight: 300;font-style: normal;">Try limiting your search to only asexual adults.</div>
</div>
<div>
<br><label for="evidenceType">Evidence</label><br>
<select id="evidenceType" name="evidenceType">
  <option value="any">any</option>
  <option value="ECO_0000104">DNA to cDNA expression microarray evidence</option>
  <option value="ECO_0001836">in situ hybridization evidence</option>
  <option value="ECO_0001047">-- fluorescence in situ hybridization evidence</option>
  <option value="ECO_0001839">-- colorimetric in situ hybridization evidence</option>
  <option value="ECO_0000295">RNA-sequencing evidence</option>
  <option value="ECO_0001560">single-cell RNA-sequencing evidence</option>
</select>
<div style="font-family=Oswald;font-weight: 300;font-style: normal;">Try limiting your search to single-cell RNA-sequencing results.</div>
</div>



<div>
   <br>
                     <input type="hidden" id="select_iri" name="iri" value=""></input>        
                     <input type="submit" value="Search" class="submit"></input> 
</div>
                  </fieldset>
                </form>

        <em>Note: Planarian Anatomy Gene Expression searches are built using the <a style="color:#32821f;" href="/anatomyontology">Planarian Anatomy Ontology</a></em>

</div>

<script>
jQuery(document).ready(function() {
  var app = require("ols-autocomplete");
  var instance = new app();
  instance.start({});
});
</script>
</div>
<div class="second-column">
<div class="block-inner clearfix">
            
    <div class="block-content clearfix">

<div class="front-box bg-ltorange" style="height:200px; float:right; border-width: 5px;border-color: green;border-style: solid;" onclick="document.location='/search/page/term'"><h4 class="gray" style="font-family:oswaldregular">Search Expression by Term</h4><h5 class="ltgray" style="font-family:oswaldregular">Find transcripts that are expressed in an anatomical structure using PAGE search</h3></div>
<div class="front-box bg-ltyellow" style="height:200px; float:right;" onclick="document.location='/search/page/transcript'"><h4 class="gray" style="font-family:oswaldregular">Search Expression by Transcript</h4><h5 class="ltgray" style="font-family:oswaldregular">Find anatomical structures that express your transcript using PAGE search</h3></div>
<div class="front-box bg-ltgreen" style="height:200px; float:right;"  onclick="document.location='/search/page/publication'"><h4 class="gray" style="font-family:oswaldregular">Search Expression by Publication</h4><h5 class="ltgray" style="font-family:oswaldregular">Find a manuscript’s transcripts and the structures they are expressed in using PAGE search</h3></div>

    </div>
  </div>
</div>

</div> <!-- end of searchfomr -->

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$q = $_POST["q"];
$iri = $_POST["iri"];
if (!empty($iri)){
$searchType = $_POST["searchType"];
$specimenType = $_POST["specimenType"];
$lifecycleType = $_POST["lifecycleType"];
$evidenceType = $_POST["evidenceType"];


$userSearch = "userSearch:";
$header = $q;
if ($searchType == 'is_a'){
  // user wants all terms that are this term and 'is a' this term and has any other related term
  $userSearch = "?a oban:association_has_object ?sc . ?sc rdfs:subClassOf \"userSearch:\"^^ow:omn  . ?sc rdfs:label ?tissue";
}elseif($searchType == 'exact'){
  // user only wants associations that are exactly this term
  $userSearch = "?a oban:association_has_object <$iri> . <$iri> rdfs:label ?tissue";
}elseif ($searchType == 'part_of'){
  $userSearch = "?a oban:association_has_object ?sc . ?sc rdfs:subClassOf \"po: some userSearch:\"^^ow:omn  . ?sc rdfs:label ?tissue";
}elseif ($searchType == 'contained_in' ){
  $userSearch = "?a oban:association_has_object ?sc . ?sc rdfs:subClassOf \"ci: some userSearch:\"^^ow:omn  . ?sc rdfs:label ?tissue";
}elseif ($searchType == 'develops_from' ){
  $userSearch = "?a oban:association_has_object ?sc . ?sc rdfs:subClassOf \"df: some userSearch:\"^^ow:omn  . ?sc rdfs:label ?tissue";
}

$userSearch_specimenType = '';
if ($specimenType != 'any'){
  $userSearch_specimenType = " .  VALUES ?s_id {OBO:$specimenType } ";
}
$userSearch_lifecycleType = '';
if ($lifecycleType != 'any'){
  //$userSearch_lifecycleType = " .  VALUES ?l_id {OBO:$lifecycleType }  ";
   $userSearch_lifecycleType = " . ?l_id rdfs:subClassOf \"OBO:$lifecycleType\"^^ow:omn " ;
}
$userSearch_evidenceType = '';
if ($evidenceType != 'any'){
  if ($evidenceType == 'ECO_0001836'){
    $userSearch_evidenceType = " .  VALUES ?e_id {OBO:ECO_0001839 OBO:ECO_0001047 }  ";
  }else{
    $userSearch_evidenceType = " .  VALUES ?e_id {OBO:$evidenceType }  ";
  }
}



$query = "
PREFIX userSearch: <$iri>
PREFIX ci: <http://purl.obolibrary.org/obo/RO_0001018>
PREFIX po: <http://purl.obolibrary.org/obo/BFO_0000050>
PREFIX df: <http://purl.obolibrary.org/obo/RO_0002202>
PREFIX ow: <http://purl.org/phenoscape/owlet/syntax#>
PREFIX string: <http://www.w3.org/2001/XMLSchema#string>
PREFIX OBO: <http://purl.obolibrary.org/obo/>
PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX oban: <http://oban.org/oban/>
PREFIX PAGE: <http://planosphere.stowers.org/page/>
PREFIX dc: <http://purl.org/dc/elements/1.1/>
PREFIX desc: <http://purl.obolibrary.org/obo/IAO_0000115>
PREFIX ei: <http://purl.obolibrary.org/obo/RO_0002200>
SELECT DISTINCT ?tissue ?sc ?gene ?ref ?ref_gene ?source ?pub ?s ?s_id ?l ?l_id ?e ?e_id ?d
WHERE 
{ 
  ?a dc:source ?pub . 
  ?a oban:association_has_predicate ei: . 
  ?a oban:association_has_subject ?gene . $userSearch .  
  ?a1 oban:association_has_predicate PAGE:has_mapping_reference_id . 
  ?a1 oban:association_has_subject ?gene . 
  ?a1 oban:association_has_object ?ref .  
  ?a1 dc:source ?source .  
  ?a OBO:OBI_0100051 ?s_id .  
  ?a OBO:RO_0002490 ?l_id . 
  ?a OBO:RO_0002558 ?e_id . 
  ?s_id rdfs:label ?s . 
  ?l_id rdfs:label ?l . 
  ?e_id rdfs:label ?e 
  $userSearch_evidenceType 
  $userSearch_specimenType 
  $userSearch_lifecycleType 
}";



$clean_query = urlencode($query);
$expand_url = "http://172.16.2.41:8080/kbs/plana/expand?query=" . $clean_query;

$ch = curl_init($expand_url);
curl_setopt($ch, CURLOPT_URL, $expand_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$expand_query = curl_exec($ch);
curl_close ($ch);

// add on the ref_source 
$ref_transcript_source = ". ?a1 PAGE:has_reference_source 'smed_20140614'^^string:  ";
$expand_query = preg_replace('/}$/', "$ref_transcript_source }", $expand_query);
//add the optional gene model
$ref_gene_models = " . OPTIONAL {?a2 oban:association_has_subject ?gene . ?a2 oban:association_has_object ?ref_gene . ?a2 PAGE:has_reference_source 'SMESG_dd_Smes_v2'^^string: }";
$expand_query = preg_replace('/}\s*$/', "$ref_gene_models }", $expand_query);
//add description
$description = " . OPTIONAL {?a3 oban:association_has_object_property desc: . ?a3 oban:association_has_subject ?ref . ?a3 oban:association_has_object ?d }";
$expand_query = preg_replace('/}\s*$/', "$description}", $expand_query);

//curl -X POST http://172.16.2.41:8889/page/sparql --data-urlencode 'query=$expand' --data-urlencode 'format=json'
$sparql = array(
        'query' => $expand_query,
        'format' => 'json'
);
$url = "http://172.16.2.41:8889/page/sparql";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($sparql));

$expand_json = curl_exec($ch);
curl_close ($ch);

$expand= json_decode($expand_json,true);
$to_print = "<table>";
$to_print .=  "<thead><tr><th>$searchType $q</th><th>Reference Transcript</th><th>Description</th><th>Gene Models</th><th>Published Transcript</th><th>Transcriptome</th><th>Publication</th><th>Specimen</th><th>Lifecycle</th><th>Evidence</th></tr></thead>";
$to_print .= "<tbody>";

$uniquenames=[];
$result_count = 0;
foreach ($expand as $result){
 $r = $result['bindings'];
 foreach($r as $each){
   $uniquenames[]=$each['ref']['value'];
   $result_count++; 
   $pub_link='';
   $publication_url = $each['pub']['value'] ;
   if (preg_match('/pubmed\/(\S+)/', $publication_url, $match)){

      $pub_link = "<a href=\"$publication_url\">PMID:$match[1]</a>";
   }else{
     $pub_link = "<a href=\"$publication_url\">$publication_url</a>";
   }
   $structure_class = $each['sc']['value'];
   $pieces = explode("/", $structure_class);
   $term_link = "/ontology/" . end($pieces);
   $genes = explode(";",$each['ref_gene']['value']);
   $ref_gene_models = '';
   foreach ($genes as $gene){
         $ref_gene_models .= "<a target=\"_blank\" href=\"http://planmine.mpi-cbg.de/planmine/portal.do?externalids=$gene\">$gene</a> ";
   }
   $to_print .= "<tr><td><a href=\"$term_link\" target=\"_blank\">".  $each['tissue']['value'] .  "</a></td><td><a href=\"https://planosphere.stowers.org/feature/Schmitea/mediterranea-sexual/transcript/" . $each['ref']['value']  . "\">". $each['ref']['value'] . "</a></td><td>". urldecode($each['d']['value'])    . "</td><td>" .      $ref_gene_models .   "</td><td>". $each['gene']['value'] .    "</td><td>". $each['source']['value']  .  "</td><td>". $pub_link    . "</td><td>". $each['s']['value']    . "</td><td>". $each['l']['value']    . "</td><td>". $each['e']['value']    . "</td></tr>"; 

  }
}
$to_print .= "</tbody>";
$to_print .= "</table>" ;

print "<hr><div ><h3>Search Details</h3>
Result count: $result_count<br>
Search term: $q<br>
Term IRI: $iri<br>
searchType: $searchType<br>
specimenType: $specimenType<br>
lifecycleType: $lifecycleType<br>
evidenceType: $evidenceType<br>
</div>";

$uniquenames_str =  implode(",", $uniquenames);

if ($result_count >= 0){
  print "
<div id=\"outer\">

<div class=\"inner\">
<form action=\"/search/page/download\" method=\"post\">
  <input type=\"hidden\" name=\"sparql\" value=\"$expand_query\">
  <input type=\"submit\" value=\"Download Results\">
</form>
</div>
<div class=\"inner\">
<form action=\"/download/fasta\" method=\"post\">
  <input type=\"hidden\" name=\"uniquenames\" value=\"$uniquenames_str\">
  <input type=\"submit\" value=\"Download FASTA\">
</form>
</div>
<div class=\"inner\">
<form action=\"/download/sparql\" method=\"post\">
  <input type=\"hidden\" name=\"sparql\" value=\"$expand_query\">
  <input type=\"submit\" value=\"Download SPARQL Query\">
</form>
</div>
</div>
";

  print "<div class=\"views-table\">
  <hr>
  $to_print
  </div>
";
}
}else {
  print '<div style="color:red;"><p>Select a term from dropdown term select.</p></div>';
}
} 
?>

</body>
</html>





