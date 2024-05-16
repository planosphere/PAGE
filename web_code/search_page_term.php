<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <title>PAGE</title>

<style type="text/css">
//loading icon
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
  opacity: 0.25;
	background: url(https://smallenvelop.com/wp-content/uploads/2014/08/Preloader_11.gif) center no-repeat #fff;
}


// datatable formating
tbody tr.odd th, tbody tr.odd td {
     border-bottom: none;
}
tbody td, tbody th {
    border-bottom: none;
}
tbody tr.odd th, tbody tr.odd td {
     border-bottom: none;
}


table.dataTable thead .sorting:before, table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:before, table.dataTable thead .sorting_desc_disabled:after {
  bottom: 0.5em !important
}

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


.tt {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tt .ttt {
  visibility: hidden;
  width: auto;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 10px;
  
  /* Position the tooltip */
  position: absolute;
  z-index: 1;
  bottom: 100%;
  left: 50%;
  margin-left: -100px;
}

.tt:hover .ttt {
  visibility: visible;
}
.button {
  border: none;
  color: white;
  padding: 5px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  cursor: pointer;
  width: 150px;
  height: 25px;
}
.button0 {background-color: #8EBB8E;} /* Green0 */
.button1 {background-color: #6CBA61;} /* Green1 */
.button2 {background-color: #3ead58;} /* Green2 */
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.5/handlebars.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/0.11.1/typeahead.bundle.min.js"></script>
<script src="/pub/OLS/OLS-autocomplete/build/ols-autocomplete.js"></script>

<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
<script>
//paste this code under the head tag or in a separate js file.
	// Wait for window load
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>
</head>
<body>
<div class="se-pre-con"></div>
<div id="searchform" class="row">
<div class="first-column">
<h2 style="color:#32821f;font-size:1.9em;font-family:oswaldregular">Search expression patterns in the literature using PAGE.</h2>
<h2 style="color:#32821f;font-size:1.9em;font-family:oswaldregular">Identify transcripts expressed in anatomical structures as reported in planarian community publications</h2> <hr>



<?php

$c1 = '
<div style="position: relative;left: 50px;font-size:1.2em"><br>
<img src="/pub/images/PAGE_search_graphic_v2.png">
<p><br></p>
<p>Search expression patterns in the literature using PAGE.</p>
<p>PAGE is a database of published transcripts and expression patterns.</p>
<p>All data were manually curated from planarian manuscripts published between 2005-2019.</p>
<p>Locations of expression were collected from <a target="_blank" style="color:#32821f;" href="/search/plana/litreview">200 publications</a>.</p>
<p>Locations are all standardized terms that are defined in the Planarian Anatomy (PLANA) Ontology.</p>

<p>Use a location (anatomical term) to retrieve transcripts that are expressed in this location.</p>
<p>The search can be modified to include other structures that are of the same type (<u>is a</u>) or only anatomical structures that are <u>part of</u>, <u>contained in</u>, or <u>develops from</u> your search term.</p>
<p>In order to better understand the anatomical terms returned in your search you can browse the ontology here on <a style="color:#32821f;" target="_blank" href="https://planosphere.stowers.org/ontology">Planosphere</a> or at EBI <a style="color:#32821f;" target="_blank" href="https://www.ebi.ac.uk/ols/ontologies/plana">OLS</a>.</p><br><br><a style="color:#32821f;" target="_blank" href="/search/page/about">Read more about PAGE</a>
<br>
<h2>PAGE Query by Term Video Tutorial</h2>
<iframe title="vimeo-player" src="https://player.vimeo.com/video/490442415" width="640" height="356" frameborder="0" allowfullscreen>PAGESearchTerm</iframe>
<br><br>
<p>Find more video tutorial help on our <a style="color:#32821f;" target="_blank"  href="allresources/tutorials">tutorials page</a>.</p>
<br><br>
<p>
Searching by anatomical term <strong>will only return transcripts that were annotated as being expressed in that specific anatomical term by the authors of the evidence</strong>. This search WILL NOT return expression annotation of all equivalent transcripts from other transcriptomes. If you are interested in equivalent transcripts, use <a style="color:#32821f;" target="_blank"  href="search/rosettastone/blaze">Rosetta Stone Transcript Mapper</a>  to determine them  and then run independent <a style="color:#32821f;" target="_blank"  href="search/page/transcript">search by transcripts</a> to determine anatomical terms associated with the equivalent transcripts.
</p>
</div>
<hr>

';

$c2 = '

<div style="position: relative;left: 10px;font-size:1.2em">


<br>
<strong>General search tips</strong>:
<ul>
  <li><strong>Start simple.</strong> Start with just an anatomical term in the first autocomplete text box. See what is returned.</li>
  <li>Try adding additional filters one at a time. Each filter can potentially reduce the number of results that are returned.</li>
  <li>Since the Planarian Anatomy Ontology is not yet complete and the publications annotated in the PAGE database is finite not all searches will return results. This is where you can help PLANA and PAGE grow and become more comprehensive. Visit <a target="_blank" href="anatomyontology">About PLANA</a> to see how to contribute.</li>
  <li>If you are still having issues with your search not returning results you expect it is likely due to one the points below.</li>
</ul>
<br>
   <strong>Using <u>part of</u> vs <u>contained in</u></strong>:
       <ul>
          <li>If you search using \'head region\' and <u>part of</u> you will get ZERO results</li>
          <li>If you search using \'head region\' and <u>contained in</u> you will get >20,000 results</li>
          <li><u>contained in</u> describes anatomical structures that are found within an <em>area</em>, such as the \'head region\', \'tail region\', \'midline\', and, \'dorsal region\'. (e.g. \'eye\' <u>contained in</u> \'head region\')</li>
          <li><u>part of</u> describes anatomical structures that are found within a larger <em>anatomical structure</em>, such as cell is part of a tissue. (e.g. \'photoreceptor neuron\' <u>part of</u> \'eye\')</em></li>
          <li><u>contained in</u>. Anatomical structures can only be contained in an \'anatomical region\'
              <ul>
                 <li>\'midline\'</li>
                 <li>\'head region\'</li>
                 <li>\'tail region\'</li>
                 <li>\'tail tip\'</li>
                 <li>\'tail stripe\'</li>
                 <li>\'prepharyngeal region\'</li>
                 <li>\'parapharyngeal region\'</li>
                 <li>\'postpharyngeal region\'</li>
                 <li>\'anterior tip\'</li>
                 <li>\'anterior pole\'</li>
                 <li>\'posterior pole\'</li>
                 <li>\'copulatory region\'</li>
              </ul>
          </li>
       </ul>


<br>
<strong>Examples using <u>part of</u></strong><br>
     <ul>
         <li>\'gut\' <u>part of</u> \'digestive system\'</li>
         <li>\'intestinal phagocyte\' <u>part of</u> \'gut\'</li>
     </ul>

     <strong>Examples using <u>contained in</u></strong><br>
     <ul>
         <li>\'pharynx\' <u>contained in</u> \'parapharyngeal region\'</li>
         <li>\'cephalic ganglia\' <u>contained in</u> \'head region\'</li>
         <li>\'mouth\' <u>contained in</u> \'ventral region\'</li>
     </ul>

<br><strong>Other Search Examples</strong>:<br>
<p>Identify transcripts associated with:</p>
 <ul>


   <li>any anatomical term that <u>is a</u> ...
    
         <ul>
            <li><u>is a</u> <a style="color:#32821f;" target="_blank" href="/ontology/PLANA_0000429">neoblast</a> &#8594; will return transcripts expressed in \'zeta-neoblasts\', \'sigma-neoblast\', \'gamma neoblast\', etc.</li>
            <li><u>is a</u> <a  style="color:#32821f;" target="_blank" href="/ontology/PLANA_0000044">cephalic ganglia</a> &#8594; will return transcripts expressed in the \'cephalic ganglia\'</li> 
            <li><u>is a</u> <a  style="color:#32821f;" target="_blank"  href="/ontology/PLANA_0000025">nervous system</a> &#8594; will return transcripts expressed in the \'central nervous system\', \'peripheral nervous system\' and \'nervous system\'</li>
         </ul>
   </li>
   <li>anatomical term(s) that are <u>exactly</u> curated as being expressed in ...
         <ul>
            <li>exactly <a  style="color:#32821f;" target="_blank" href="/ontology/PLANA_0000429">neoblast</a> &#8594; will return transcripts associated with \'neoblast\'</li>
            <li>exactly <a  style="color:#32821f;" target="_blank" href="/ontology/PLANA_0000418">head region</a> &#8594; will return transcripts annotated as being expressed in the \'head region\'</li> 
            <li>exactly <a  style="color:#32821f;" target="_blank"  href="/ontology/PLANA_0000025">nervous system</a> &#8594; will return transcripts annotated as being expressed in the \'nervous system\'</li>
         </ul>
   </li>
   <li>any anatomical term that is <u>part of</u> ...
      <ul>
         <li><u>part of</u> <a  style="color:#32821f;" target="_blank" href="/ontology/PLANA_0000103">central nervous system</a> &#8594;  will return transcripts expressed in \'cephalic ganglia\' , \'glial cell\', \'optic chiasm\',  etc</li>
         <li><u>part of</u> <a  style="color:#32821f;" target="_blank" href="/ontology/PLANA_0000016">pharynx</a> &#8594; will return transcripts expressed in \'esophagus\' , \'pharynx musculature\', \'pharynx nerve plexus\', etc</li>
      </ul>
   </li>
   <li>any anatomical term that is <u>contained in</u> ...
      <ul>
       <li><u>contained in</u> the <a  style="color:#32821f;" target="_blank" href="/ontology/PLANA_0000142">posterior region of the whole animal</a> &#8594; will return transcripts expressed in \'tail region\' , \'tail strip\', \'gut\', etc</li>
       <li><u>contained in</u> the <a  style="color:#32821f;" target="_blank" href="/ontology/PLANA_0000418">head region</a> &#8594; will return transcripts expressed in the \'eye\' , \'cephalic ganglia\', \'pigment cup cell\', etc</li>
      </ul>
   </li>
   <li>any anatomical term that <u>develops from</u> ...
    <ul> 
      <li> <u>develops from</u> a <a  style="color:#32821f;" target="_blank" href="/ontology/PLANA_0000014">zeta-neoblast</a>  &#8594; will return transcripts expressed  \'Category 2 cell\'.</li>
      <li><u>develops from</u> a <a  style="color:#32821f;" target="_blank" href="/ontology/PLANA_0004517">blastomere</a>  &#8594;will return transcripts expressed in the \'germline stem cell\', \'oogonial stem cell\', etc.</li>
    </ul>
  </li>
</ul>
<br>
</div>

';

print theme(
  'ctools_collapsible',
  array(
      'handle' => '<button class="button button1" type="button">About This Search</button>', 
    'content' => $c1,
    'collapsed' => TRUE
  )
);

print("<p></p>");



print theme(
  'ctools_collapsible',
  array(
     'handle' => '<button class="button button2" type="button">Search Tips</button>',
    'content' => $c2,
    'collapsed' => TRUE
  )
);
print("<p></p>");



?>





<hr>
<div class="grid_10 omega" style="margin-left:30px">


                <form method="post">  
                    <fieldset>
<div class="just_this_ols">
    <style scoped>
        @import "/pub/OLS/OLS-autocomplete/css/ols-colors.css";
        @import "/pub/OLS/OLS-autocomplete/css/ols.css";
        @import "/pub/OLS/OLS-autocomplete/css/bootstrap.css";
        @import "/pub/OLS/OLS-autocomplete/css/typeaheadjs.css";

    </style>
<h2 style="font-size:1.9em;font-family:oswaldregular">Find transcripts expressed in:</h2>
<div style="display:none" id="expandedSearch">
 <h4 style="font-size:1em;font-family:oswaldregular">Relationship:</h4> 


<!-- <br><label for="searchType">Search Type</label><br>-->
<select id="searchType" name="searchType" onchange="showSummary()">
  <option value="is_a">is a: any anatomical term that is a [Your Search Term]</option>
  <option value="part_of">part of: any anatomical term that is part_of [Your Search Term]</option>
  <option value="contained_in">contained in: any anatomical term that is contained_in [Your Search Term]</option>
  <option value="develops_from">develops from:  any anatomical term that develops_from [Your Search Term]</option>
  <option value="exact">exact:  only the anatomical term that is exactly [Your Search Term] </option>
</select>
<div style="font-family=Oswald;font-weight: 300;font-style: normal;">Try searching for transcripts that are expressed in any structure that is 'part of' the 'cephalic ganglia' (select 'cephalic ganglia' above and 'part of' here).</div>
<div style="font-family=Oswald;font-weight: 300;font-style: normal;">Try searching for transcripts that are expressed in any structure that is 'contained in' the 'head' (select 'head' above and 'contained in' here).</div>
</div>
<br>

                        <label>
 <h4 style="font-size:1em;font-family:oswaldregular">Anatomical Term:</h4> 
 <input style="font-weight: normal" size="35" type="text"  name="q" data-olswidget="select" data-olsontology="plana" data-selectpath="https://www.ebi.ac.uk/ols/"  id="local-searchbox" placeholder="Select term in list" onchange="showSummary()"></input><div style="font-family=Oswald;font-weight: 300;font-style: normal;"> &bull;&nbsp;Start typing.<br>
&bull;&nbsp;Once you complete a few characters of a PLANA term, a list will appear.<br>
&bull;&nbsp;You <strong>must select</strong> one of these autocomplete terms for the search to function.<br>
&bull;&nbsp;Try 'neoblast' or 'cephalic ganglia'
</div>
                        </label>
<br>
<input type="checkbox" id="expandedCheck" onclick="viewExpandedSearch()"> Perform expanded search with relationships<br>
<input type="checkbox" id="limitedCheck" onclick="viewLimitedSearch()"> Limit search by experimental details
</div>

<div style="display:none" id="limitedSearch" >
 <h2 style="font-size:1.9em;font-family:oswaldregular">Limit transcripts by experimental details:</h2> 

<div>
<br><label for="specimenType">Specimen Type</label><br>
<select id="specimenType" name="specimenType"  onchange="showSummary()">
  <option value="any">any</option>
  <option value="PLANA_0000136">whole organism</option>
  <option value="PLANA_0002138">FACS sorted cell population</option>
</select>
<div style="font-family=Oswald;font-weight: 300;font-style: normal;">Try limiting your search to only FACS sorted cells.</div>
</div>
<div>
<br><label for="lifecycleType">Life Cycle</label><br>
<select id="lifecycleType" name="lifecycleType" onchange="showSummary()">
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
<select id="evidenceType" name="evidenceType"  onchange="showSummary()">
  <option value="any">any</option>
  <option value="ECO_0000097">cDNA to DNA expression microarray evidence</option>
  <option value="ECO_0001836">in situ hybridization evidence</option>
  <option value="ECO_0001047">-- fluorescence in situ hybridization evidence</option>
  <option value="ECO_0001839">-- colorimetric in situ hybridization evidence</option>
  <option value="ECO_0000295">RNA-sequencing evidence</option>
  <option value="ECO_0001560">single-cell RNA-sequencing evidence</option>
</select>
<div style="font-family=Oswald;font-weight: 300;font-style: normal;">Try limiting your search to single-cell RNA-sequencing results.</div>
</div>
</div>


<div>
   <br>
                     <input type="hidden" id="select_iri" name="iri" value=""></input>        
                     <input id="submit" type="submit" value="Search" class="submit"></input>
<p id="search-statement"></p>
</div>
                  </fieldset>
                </form>

        <em>Note: Planarian Anatomy Gene Expression searches are built using the <a style="color:#32821f;" target=\"_blank\" href="/anatomyontology">Planarian Anatomy Ontology</a>. Read about the <a style="color:#32821f;" target=\"_blank\" href="https://github.com/planosphere/PAGE/blob/master/curation_rules.md">rules</a> on how papers were curated for PAGE. </em>

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

<div class="front-box bg-ltorange" style="height:175px; float:right;border-width: 5px;border-color: green;border-style: solid;" onclick="document.location='/search/page/term'"><h4 class="gray" style="font-family:oswaldregular">Search Expression by Term</h4><h5 class="ltgray" style="font-family:oswaldregular">Find transcripts that are expressed in an anatomical structure using PAGE search</h5></div>
<div class="front-box bg-ltyellow" style="height:175px; float:right;"   onclick="document.location='/search/page/transcript'"><h4 class="gray" style="font-family:oswaldregular">Search Expression by Transcript</h4><h5 class="ltgray" style="font-family:oswaldregular">Find anatomical structures that express your transcript using PAGE search</h5></div>
<div class="front-box bg-ltgreen" style="height:175px; float:right; "   onclick="document.location='/search/page/publication'"><h4 class="gray" style="font-family:oswaldregular">Search Expression by Publication</h4><h5 class="ltgray" style="font-family:oswaldregular">Find a manuscript’s transcripts and the structures they are expressed in using PAGE search</h5></div>
<div class="front-box bg-ltgreenteal" style="height:125px; float:right;" onclick="document.location='/search/page/about'"><h4 class="gray" style="font-family:oswaldregular">Search the Literature</h4><h5 class="ltgray" style="font-family:oswaldregular">Read about Page</h5></div>
<div class="front-box bg-lttealgreen" style="height:125px; float:right;" onclick="document.location='https://github.com/planosphere/PAGE/issues/new/choose'"><h4 class="gray" style="font-family:oswaldregular">Contibute</h4><h5 class="ltgray" style="font-family:oswaldregular">Add Your Data to PAGE</h5></div>

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
   $userSearch_lifecycleType = " . ?l_id rdfs:subClassOf  \"OBO:$lifecycleType\"^^ow:omn " ;
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
PREFIX ei: <http://purl.obolibrary.org/obo/RO_0002206>
SELECT DISTINCT ?tissue ?sc ?gene ?ref ?ref_gene ?source ?pub ?s ?s_id ?l ?l_id ?e ?e_id ?d ?c
WHERE 
{ 
  ?a dc:source ?pub . 
  ?a oban:association_has_object_property ei: . 
  ?a oban:association_has_subject ?gene . $userSearch .  
  ?a1 oban:association_has_object_property PAGE:has_mapping_reference_id . 
  ?a1 oban:association_has_subject ?gene . 
  ?a1 oban:association_has_object ?ref .  
  ?a1 dc:source ?source .  
  ?a OBO:OBI_0100051 ?s_id .  
  ?a OBO:RO_0002490 ?l_id . 
  ?a OBO:RO_0002558 ?e_id . 
  ?s_id rdfs:label ?s . 
  ?l_id rdfs:label ?l . 
  ?e_id rdfs:label ?e 
  $userSearch_lifecycleType 


}";

 // $userSearch_evidenceType 
 // $userSearch_specimenType 



$clean_query = urlencode($query);
$expand_url = "http://172.16.2.41:8080/kbs/plana/expand?query=" . $clean_query;

$ch = curl_init($expand_url);
curl_setopt($ch, CURLOPT_URL, $expand_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$expand_query = curl_exec($ch);
curl_close ($ch);

// add fixed queries
$filters = $userSearch_evidenceType; 
$filters .=  $userSearch_specimenType;
$expand_query = preg_replace('/}$/', "$filters }", $expand_query);

// add on the ref_source 
$ref_transcript_source = ". ?a1 PAGE:has_reference_source 'smed_20140614'^^string:  ";
$expand_query = preg_replace('/}$/', "$ref_transcript_source }", $expand_query);




//add the optional gene model
$ref_gene_models = " . OPTIONAL {?a2 oban:association_has_subject ?gene . ?a2 oban:association_has_object ?ref_gene . ?a2 PAGE:has_reference_source 'SMESG_dd_Smes_v2'^^string: }";
$expand_query = preg_replace('/}\s*$/', "$ref_gene_models }", $expand_query);
//add description
$description = " . OPTIONAL {?a3 oban:association_has_object_property desc: . ?a3 oban:association_has_subject ?ref . ?a3 oban:association_has_object ?d }";
$expand_query = preg_replace('/}\s*$/', "$description}", $expand_query);
//add citation
$citation = " . OPTIONAL {?a4 oban:association_has_object_property OBO:IAO_0000301 . ?a4 oban:association_has_object ?pub . ?a4 oban:association_has_subject ?c}";
$expand_query = preg_replace('/}\s*$/', "$citation}", $expand_query);

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
$to_print = "<table id='pageResults'>";


$page_icons = array(
"whole organism" => "wholeorganism.png",
"FACS sorted cell population" => "FACSsortedcellpopulation.png",
"adult hermaphrodite" => "adultsexual.png",
"asexual adult" => "adultasexual.png",
"juvenile" => "sexualjuvenile.png",
"Stage 2" => "stage2.png",
"Stage 3" => "stage3.png",
"Stage 4" => "stage4.png", 
"Stage 5" => "stage5.png", 
"Stage 6" => "stage6.png", 
"Stage 7" => "stage7.png", 
"Stage 8" => "stage8.png", 
"cDNA to DNA expression microarray evidence" => "cDNAtoDNAexpressionmicroarray.png", 
"fluorescence in situ hybridization evidence" => "fluorescenceinsituhybridizationevidence.png", 
"colorimetric in situ hybridization evidence" => "colorimetricinsituhybridizationevidence.png", 
"RNA-sequencing evidence" => "RNA-sequencingevidence.png", 
"single-cell RNA-sequencing evidence" => "single-cellRNA-sequencingevidence.png"
);


$header_1 = [];
$header_2 = [];

$header_1[] = "<th colspan=\"3\" style=\"text-align:left;background-color:#80bd88\"><div class=\"tt\">Reference Sequence Information<span class=\"ttt\">Sequence from publication observation was mapped to smed_20140614 and dd_smes_v2 gene models</span></div></th>";
$header_1[]= "<th colspan=\"6\" style=\"text-align:left;background-color:#80bd88d1\"><div class=\"tt\">Observation Curated from Publication<span class=\"ttt\">Sequence and expression data was curated from the listed publication.</span></div></th>";

$header_2[] = "<th><div class=\"tt\">ID<span class=\"ttt\">Transcript ID from smed_20140614 that maps to the published Seq ID</span></div></th>";
$header_2[] = "<th><div class=\"tt\">Description<span class=\"ttt\">Sequence Description is the genbank name or if not available it was assigned by AHRD</span></div></th>";
$header_2[] = "<th><div class=\"tt\">Gene Models<span class=\"ttt\">Gene Model ID from dd_smes_v2 that maps to the published Seq ID</span></div></th>";
$header_2[] = "<th style=\"text-align:left;background-color:#CFCFCF\"><div class=\"tt\" >Seq ID<span class=\"ttt\">Seq ID used in publication</span></div></th>";
$header_2[] = "<th style=\"text-align:left;background-color:#CFCFCF\"><div class=\"tt\">Expressed In<span class=\"ttt\">Published location of expression.<br>Best fitting PLANA Ontology term was used.</span></div></th>";
$header_2[] = "<th colspan=\"3\" style=\"text-align:left;background-color:#CFCFCF\"><div class=\"tt\">Experimental Details<span class=\"ttt\">Specimen type, Lifecycle stage, and Evidence type</span></div></th>";
$header_2[]= "<th style=\"text-align:left;background-color:#CFCFCF\"><div class=\"tt\" >PMID<span class=\"ttt\">Observation Citation (Pubmed ID)</span></div></th>";


$table = "
<div class=\"container\">
<table id='pageResults'>";
$table .=  "<thead><tr>" . implode("",$header_1) . "</tr><tr>" .   implode("",$header_2) . "</tr></thead></table></div>";
$rows=[];



$uniquenames=[];
$result_count = 0;
foreach ($expand as $result){
 $r = $result['bindings'];
 foreach($r as $each){
   $uniquenames[]=htmlspecialchars($each['ref']['value']);
   $result_count++; 
   $pub_link='';
   $publication_url = $each['pub']['value'] ;
   if (preg_match('/pubmed\/(\S+)/', $publication_url, $match)){
      $pub_link = "<a  target=\"_blank\"  href=\"$publication_url\">$match[1]</a>";
   }else{
     $pub_link = "<a  target=\"_blank\" href=\"$publication_url\">$publication_url</a>";
   }
   $pmid = $pub_link;
   //$pmid = $each['c']['value'] ;
   if ($each['c']['value']){
     $pmid = "<div class=\"tt\">" . $pmid . "<span class=\"ttt\">" .($each['c']['value']) . "</span></div>";
   }
   $structure_class = $each['sc']['value'];
   $pieces = explode("/", $structure_class);
   $term_link = "/ontology/" . end($pieces);
   $genes = explode(";",$each['ref_gene']['value']);
   $transcript_src = "<div class=\"tt\">" .($each['gene']['value'])   . "<span class=\"ttt\">transcriptome: ".($each['source']['value']) . "</span></div>";
   $ref_gene_models = '';
   foreach ($genes as $gene){
         $ref_gene_models .= "<a target=\"_blank\" href=\"http://planmine.mpi-cbg.de/planmine/portal.do?externalids=$gene\">$gene</a> ";
   }
$path = '/pub/analysis/page/page_icons/';
$specimen = $each['s']['value'];
$lifecycle = $each['l']['value'];
$evidence = $each['e']['value'];
if ( array_key_exists($specimen,$page_icons)){
  $img = $page_icons[$specimen];
  $specimen = "<div class=\"tt\"><img src=\"$path/$img\"><span class=\"ttt\">specimen type: ".  $each['s']['value'] . "</span></div> ";
}
if ( array_key_exists($lifecycle,$page_icons)){
  $img = $page_icons[$lifecycle];
  $lifecycle = "<div class=\"tt\"><img src=\"$path/$img\"><span class=\"ttt\">lifecycle type: ".  $each['l']['value'] . "</span></div> ";
}
if ( array_key_exists($evidence,$page_icons)){
  $img = $page_icons[$evidence];
  $evidence =  "<div class=\"tt\"><img src=\"$path/$img\"><span class=\"ttt\">evidence type: ".  $each['e']['value'] . "</span></div> ";
}

$columns = [];
$columns[] = "<a  target=\"_blank\"  href=\"https://planosphere.stowers.org/feature/Schmitea/mediterranea-sexual/transcript/" . $each['ref']['value']  . "\">". $each['ref']['value'] . "</a>";
$columns[] =  str_replace("'","&#39;", htmlspecialchars($each['d']['value']) ) ;
$columns[] = $ref_gene_models;
$columns[] = $transcript_src;
$columns[] = "<a  target=\"_blank\"  href=\"$term_link\" target=\"_blank\">".  $each['tissue']['value'] .  "</a>";
$columns[] =  $specimen;
$columns[] =  $lifecycle ; 
$columns[] =  $evidence; 
$columns[] =  $pmid;

$thisRow = "['" . implode( "','",$columns) . "']";
$rows[] = $thisRow;




}
}
$data = '[' . implode(",",$rows) . ']' ;

print "<hr><div ><h3>Search Details for $searchType $q</h3>
Result count: $result_count<br>
specimenType: $specimenType &vert; lifecycleType: $lifecycleType  &vert; evidenceType: $evidenceType<br><br>
</div>";
//Search term: $q<br>
//searchType: $searchType<br>
//Term IRI: $iri<br>


$uniquenames_str =  implode(",", $uniquenames);

if ($result_count > 0){
  print "
<div id=\"outer\">

<div class=\"inner\">
<form action=\"/search/page/download\" method=\"post\">
  <input type=\"hidden\" name=\"sparql\" value=\"$expand_query\">
  <input class=\"button0\" type=\"submit\" value=\"Download Results\">
</form>
</div>
<div class=\"inner\">
<form action=\"/download/fasta\" method=\"post\">
  <input type=\"hidden\" name=\"uniquenames\" value=\"$uniquenames_str\">
  <input class=\"button0\" type=\"submit\" value=\"Download FASTA\">
</form>
</div>
<div class=\"inner\">
<form action=\"/download/sparql\" method=\"post\">
  <input type=\"hidden\" name=\"sparql\" value=\"$expand_query\">
  <input class=\"button0\" type=\"submit\" value=\"Download SPARQL Query\">
</form>
</div>
</div>
";


  print "<div class=\"views-table\">
<hr>

$table
</div>
";
print "
<script>
   var dataSet =  $data ;
    $(document).ready(function() {
          $('#pageResults').DataTable( {
             data: dataSet,
           });
    });
</script>

";

}






else{
  print '<br><div style="color:red;"><p>Your Search Returned 0 results. Helpful information and examples are provided in the "Click for search tips" at the top of the page.</p>';
}
}else {
  print '<br><div style="color:red;"><p>Select a term from the anatomy dropdown list for the search to work. If you are still having issues, see search tips in the "Click for search tips" at the top of the page.</p></div>';
}
} 

print "
<script>
function viewExpandedSearch() {
  // Get the checkbox
  var checkBox = document.getElementById('expandedCheck');
  // Get the output text
  var text = document.getElementById('expandedSearch');

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = 'block';
  } else {
    text.style.display = 'none';
  }
}

function viewLimitedSearch() {
  // Get the checkbox
  var checkBox = document.getElementById('limitedCheck');
  // Get the output text
  var text = document.getElementById('limitedSearch');

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.style.display = 'block';
  } else {
    text.style.display = 'none';
  }
}

function showSummary(){

  var ols_term = document.getElementById('local-searchbox').value;
  var relationship = '';
  var lifecycle = '';
  var specimen = '';
  var evidence = '';

var limits = 
{ 'PLANA_0000136' : 'whole organism',
  'PLANA_0002138' : 'FACS sorted cell population',
  'PLANA_0004503' : 'adult hermaphrodite',
  'PLANA_0004504' : 'asexual adult',
  'PLANA_0000214' : 'juvenile',
  'UBERON_0000068' : 'embryo stage',
  'PLANA_0000002' : 'Stage 2',
  'PLANA_0000003' : 'Stage 3',
  'PLANA_0000004' : 'Stage 4',
  'PLANA_0000005' :' Stage 5',
  'PLANA_0000006' : 'Stage 6',
  'PLANA_0000007' : 'Stage 7',
  'PLANA_0000008' : 'Stage 8',
  'ECO_0000097' : 'cDNA to DNA expression microarray evidence',
  'ECO_0001836' : 'in situ hybridization evidence',
  'ECO_0001047' : ' fluorescence in situ hybridization evidence',
  'ECO_0001839' : 'colorimetric in situ hybridization evidence',
  'ECO_0000295' : 'RNA-sequencing evidence',
  'ECO_0001560' : 'single-cell RNA-sequencing evidence'
};

  if (document.getElementById('searchType').value != 'is_a'){
     relationship =  document.getElementById('searchType').value;
  }
 if (document.getElementById('specimenType').value != 'any'){
    specimen =  document.getElementById('specimenType').value;
    specimen = limits[specimen];
  }
 if (document.getElementById('lifecycleType').value != 'any'){
   lifecycle =  document.getElementById('lifecycleType').value;
   lifecycle = limits[lifecycle];
 }
 if (document.getElementById('evidenceType').value != 'any'){
   evidence =  document.getElementById('evidenceType').value;
   evidence = limits[evidence];
 }


    
    if (!ols_term){
        statement = 'Select an anatomy term from dropdown autocomplete list!!';
        document.getElementById('submit').value = statement;
    }  else {
            ols_term = 'the ' + ols_term;
            var statements = [];
            if(relationship){statements.push(relationship)};
            statements.push(ols_term);
            var limit_statments = [];
            if(specimen){limit_statments.push(specimen)};
            if(lifecycle){limit_statments.push(lifecycle)};
            if(evidence){limit_statments.push(evidence)};
            var limit_statement = '';
            if (specimen || lifecycle || evidence){
                limit_statement =  ' and is limited to only ' + limit_statments.join(' and ');
            }
            var statement = 'Find all transcripts that are expressed in ' + statements.join(' ') + limit_statement;
            document.getElementById('submit').value = statement;
    }

 }
</script>
";
?>

</body>
</html>




