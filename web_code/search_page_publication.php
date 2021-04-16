<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <title>PAGE</title>

<style type="text/css">

/* Paste this css to your style sheet file or under head tag */
/* This only works with JavaScript, 
if it's not present, don't show loader */
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
  opacity: 0.5;
	background: url(https://smallenvelop.com/wp-content/uploads/2014/08/Preloader_11.gif) center no-repeat #fff;
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
.button-org {
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  width: 220px;
  height: 50px;
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



<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
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
<div id="searchform" class="row">
<div class="first-column">
<h2 style="color:#32821f;font-size:1.9em;font-family:oswaldregular">Search expression patterns in the literature using PAGE.</h2>
<h2 style="color:#32821f;font-size:1.9em;font-family:oswaldregular">Identify transcripts expressed in anatomical structures as reported in your favorite planarian community publications.</h2>
<hr>

<?php

$c1 = '
<div style="position: relative;left: 50px;font-size:1.2em"><br>
<p>Search expression patterns in the literature using PAGE.</p>
<p>PAGE is a database of published transcripts and expression patterns.</p>
<p>All data were manually curated from planarian manuscripts published between 2005-2019.</p>
<p>Locations of expression were collected from <a style="color:#32821f;" href="/search/plana/litreview" target="_blank">200 publications</a>.</p>
<p>Locations are all standardized terms that are defined in the Planarian Anatomy (PLANA) Ontology.</p>
<p>Use a PubMed ID (PMID) to retrieve transcripts and their annotated locations (anatomical structure or specific area) of expression. </p>
<p>In order to better understand the anatomical terms returned in your search you can browse the ontology here on <a style="color:#32821f;" href="https://planosphere.stowers.org/ontology" target="_blank">Planosphere</a> or at EBI <a style="color:#32821f;" href="https://www.ebi.ac.uk/ols/ontologies/plana" target="_blank">OLS</a>.</p><br><br><a style="color:#32821f;" href="/search/page/about" target="_blank">Read more about PAGE</a>

<br>
<h2>PAGE Publication Query Video Tutorial</h2>
<iframe title="vimeo-player" src="https://player.vimeo.com/video/490449953" width="640" height="400" frameborder="0" allowfullscreen>PAGESearchTranscript</iframe>
<br>
<p>Find more video tutorial help on our <a style="color:#32821f;" target="_blank"  href="allresources/tutorials">tutorials page</a>.</p>

</div>
<hr>
';

$c2 = '

<div style="position: relative;left: 50px;font-size:1.2em"><br>
<strong>General Search Tips:</strong><br>
<ul>
    <li>Only papers published between 2005 and 2019 have been curated and are included in our PAGE database.</li>
    <li>If your search returns no resutls
      <ul>
          <li>Check that there are no typos in your pubmed ID</li>
          <li>Check that we reviewed your pubmed ID by searching our included <a style="color:#32821f;" href="/search/plana/litreview" target="_blank">publication list</a></li>
          <li>Check to make sure that transcripts in your selected publication are clearly described with an accession or unique identifier. If transcripts are ambiguously noted in the literature we were unable to assign a confident sequence-anatomy association.</li>
       </ul>
    </li> 
     <li>Tools to find Pubmed IDs:
         <ul>
              <li>Find Pubmed IDs used in PLANA and PAGE with our literature review <a style="color:#32821f;" href="/search/plana/litreview" target="_blank">search tool</a></li>
              <li>Find Pubmed IDs using NCBI\'s <a style="color:#32821f;" href="https://pubmed.ncbi.nlm.nih.gov/" target="_blank">Pubmed Search</a></li>
          </ul>
   </li>
   <li>All published transcripts have been mapped to smed_20140614.</li>
  <li>Searches can be limited to life cycle stage, whole animal or FACS sorted cells, and experimental platform.</li>
</ul>
</div>
';

print theme(
  'ctools_collapsible',
  array(
 //   'handle' => '<h2 style="font-size:1.2em;">Information about this PAGE Search</h2>',
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
//    'handle' => '<h2 style="font-size:1.2em;">Search tips</h2>',
    'content' => $c2,
    'collapsed' => TRUE
  )
);

print("<p></p>");

$get_pmid = NULL;
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
  if(!empty($_GET["litpmid"])){
    $get_pmid = $_GET["litpmid"];
  }
}

?>





<hr>
<div class="grid_10 omega" style="margin-left:30px">
    <style scoped>
        @import "/pub/OLS/OLS-autocomplete/css/ols-colors.css";
        @import "/pub/OLS/OLS-autocomplete/css/ols.css";
        @import "/pub/OLS/OLS-autocomplete/css/bootstrap.css";
        @import "/pub/OLS/OLS-autocomplete/css/typeaheadjs.css";

    </style>
       <h2 style="font-size:1.9em;font-family:oswaldregular">Input Pubmed ID:</h2>
                <form method="post">  
                    <fieldset>
                        <label>Enter one or more PMID (pubmed id) separated by whitespace:<br>
 <textarea style="font-weight: normal" rows="4" cols="50"  name="q" placeholder="" ><?php echo $get_pmid; ?></textarea>
<div style="font-family=Oswald;font-weight: 300;font-style: normal;">Example search: 28072387 29674432<br>
&bull;&nbsp;Use <a style="color:#32821f" href="/search/plana/litreview" target="_blank">PAGE Lit Search</a> or <a style="color:#32821f;"href="https://pubmed.ncbi.nlm.nih.gov/" target="_blank">NCBI Pubmed Search</a> to find PMIDs
</div>

                        </label>
                    
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
 <option value="ECO_0000097">cDNA to DNA expression microarray evidence</option>
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

                     <input type="submit" value="Search" class="submit"></input> 
</div>
                  </fieldset>
                </form>
        <em>Note: Planarian Anatomy Gene Expression searches are built using the <a style="color:#32821f;" target=\"_blank\" href="/anatomyontology">Planarian Anatomy Ontology</a>. Read about the <a style="color:#32821f;" target=\"_blank\" href="https://github.com/planosphere/PAGE/blob/master/curation_rules.md">rules</a> on how papers were curated for PAGE. </em>
                
</div>

</div>
<div class="second-column">
<div class="block-inner clearfix">
            
    <div class="block-content clearfix">


<div class="front-box bg-ltorange" style="height:175px; float:right;" onclick="document.location='/search/page/term'"><h4 class="gray" style="font-family:oswaldregular">Search Expression by Term</h4><h5 class="ltgray" style="font-family:oswaldregular">Find transcripts that are expressed in an anatomical structure using PAGE search</h5></div>
<div class="front-box bg-ltyellow" style="height:175px; float:right;"   onclick="document.location='/search/page/transcript'"><h4 class="gray" style="font-family:oswaldregular">Search Expression by Transcript</h4><h5 class="ltgray" style="font-family:oswaldregular">Find anatomical structures that express your transcript using PAGE search</h5></div>
<div class="front-box bg-ltgreen" style="height:175px; float:right;border-width: 5px;border-color: green;border-style: solid; "   onclick="document.location='/search/page/publication'"><h4 class="gray" style="font-family:oswaldregular">Search Expression by Publication</h4><h5 class="ltgray" style="font-family:oswaldregular">Find a manuscript’s transcripts and the structures they are expressed in using PAGE search</h5></div>
<div class="front-box bg-ltgreenteal" style="height:125px; float:right;" onclick="document.location='/search/page/about'"><h4 class="gray" style="font-family:oswaldregular">Search the Literature</h4><h5 class="ltgray" style="font-family:oswaldregular">Read about Page</h5></div>
<div class="front-box bg-lttealgreen" style="height:125px; float:right;" onclick="document.location='/search/page/about#contribute'"><h4 class="gray" style="font-family:oswaldregular">Contibute</h4><h5 class="ltgray" style="font-family:oswaldregular">Add Your Data to PAGE</h5></div>


    </div>
  </div>
</div>

</div> <!-- end of searchfomr -->


<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if(empty($_POST["q"])){
  print '<div style="color:red;"><p>Please input at least one Pubmed ID</p></div>';
}else{

$q = $_POST["q"];
if (preg_match('/pmid/i',$q)){         
  $q = preg_replace('/pmid:?/i', '', $q);
}
$pmids = preg_split('/[\s+\n\,]+/', $q);
$userSearch_pmids = " . VALUES ?pub { pmid:". implode(" pmid:", $pmids) ." }";

$specimenType = $_POST["specimenType"];
$lifecycleType = $_POST["lifecycleType"];
$evidenceType = $_POST["evidenceType"];



$header = $pmids[0];
if (count($pmids) > 1){
  $header = "PMID";
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
PREFIX ow: <http://purl.org/phenoscape/owlet/syntax#>
PREFIX string: <http://www.w3.org/2001/XMLSchema#string>
PREFIX OBO: <http://purl.obolibrary.org/obo/>
PREFIX rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#>
PREFIX rdfs: <http://www.w3.org/2000/01/rdf-schema#>
PREFIX  pmid: <http://www.ncbi.nlm.nih.gov/pubmed/>
PREFIX oban: <http://oban.org/oban/>
PREFIX PAGE: <http://planosphere.stowers.org/page/>
PREFIX dc: <http://purl.org/dc/elements/1.1/>
PREFIX ei: <http://purl.obolibrary.org/obo/RO_0002206>
PREFIX desc: <http://purl.obolibrary.org/obo/IAO_0000115>
SELECT DISTINCT ?tissue ?sc ?gene ?ref ?ref_gene ?source ?pub ?s ?s_id ?l ?l_id ?e ?e_id ?d ?c
WHERE { 
 ?a dc:source ?pub ; 
    oban:association_has_object_property  ei: ;
    oban:association_has_subject  ?gene ;
    oban:association_has_object  ?sc . 
?sc rdfs:label ?tissue .
?a1 oban:association_has_object_property  PAGE:has_mapping_reference_id ;
      oban:association_has_subject  ?gene ; 
      oban:association_has_object  ?ref ; 
      dc:source ?source .
?a OBO:OBI_0100051 ?s_id ; 
     OBO:RO_0002490 ?l_id ; 
     OBO:RO_0002558 ?e_id . 
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



$expand_query = preg_replace('/}$/', "$userSearch_pmids }", $expand_query);
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
if(!empty($expand)){
foreach ($expand as $result){
 $r = $result['bindings'];
 foreach($r as $each){
   $uniquenames[]=htmlspecialchars($each['ref']['value']);
   $result_count++; 
   $pub_link='';
   $publication_url = $each['pub']['value'] ;
   if (preg_match('/pubmed\/(\S+)/', $publication_url, $match)){
      $pub_link = "<a target=\"_blank\" href=\"$publication_url\">$match[1]</a>";
   }else{
     $pub_link = "<a target=\"_blank\" href=\"$publication_url\">$publication_url</a>";
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
$columns[] = "<a target=\"_blank\" href=\"https://planosphere.stowers.org/feature/Schmitea/mediterranea-sexual/transcript/" . $each['ref']['value']  . "\">". $each['ref']['value'] . "</a>";
$columns[] =  str_replace("'","&#39;", htmlspecialchars($each['d']['value']) ) ;
$columns[] = $ref_gene_models;
$columns[] = $transcript_src;
$columns[] = "<a href=\"$term_link\" target=\"_blank\">".  $each['tissue']['value'] .  "</a>";
$columns[] =  $specimen;
$columns[] =  $lifecycle ; 
$columns[] =  $evidence; 
$columns[] =  $pmid;

$thisRow = "['" . implode( "','",$columns) . "']";
$rows[] = $thisRow;




}
}
$data = '[' . implode(",",$rows) . ']' ;
/// sofia
}

print "<div class=\"se-pre-con\"></div>";
print "<hr><div ><h3>Search Details for Pubmed ID: $q</h3>
Result count: $result_count<br>
specimenType: $specimenType &vert; lifecycleType: $lifecycleType  &vert; evidenceType: $evidenceType<br><br>
</div>";



$uniquenames_str =  implode(",", $uniquenames);
$display_end = 100;
if ($result_count <= 100 ){
  $display_end = $result_count;
}

if($result_count > 0){
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
  <input  class=\"button0\" type=\"submit\" value=\"Download FASTA\">
</form>
</div>
<div class=\"inner\">
<form action=\"/download/sparql\" method=\"post\">
  <input type=\"hidden\" name=\"sparql\" value=\"$expand_query\">
  <input  class=\"button0\" type=\"submit\" value=\"Download SPARQL Query\">
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
}
}
?>

</body>
</html>





