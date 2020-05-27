<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$expand_query = $_POST["sparql"];

$sparql = array(
        'query' => $expand_query,
        'format' => 'json'
);
//curl -X POST http://172.16.2.41:8889/page/sparql --data-urlencode 'query=$sparql' --data-urlencode 'format=json'

$url = "http://172.16.2.41:8889/page/sparql";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($sparql));

$expand_json = curl_exec($ch);
curl_close ($ch);
$expand= json_decode($expand_json,true);


$filename = "page_results.csv";
$fp = fopen('php://output', 'w');
header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);
fputcsv($fp, array(   "PLANA_term_name" , "PLANA_term_iri" ,  "transcript_ref" , "description", "gene_ref", "published_transcript_Name" , "published_trancriptome" ,  "Publication"    , "specimen",  "specimen_iri"  , "lifecycle" , "lifecycle_iri" , "evidence" ,"evidence_iri"  ));


foreach ($expand as $result){
 $r = $result['bindings'];
 foreach($r as $each){

   fputcsv($fp, array( $each['tissue']['value'] , $each['sc']['value'] ,$each['ref']['value'] , urldecode($each['d']['value']), $each['ref_gene']['value'] , $each['gene']['value'] ,$each['source']['value'] ,$each['pub']['value']  ,$each['s']['value'] ,$each['s_id']['value']    ,$each['l']['value'] , $each['l_id']['value']  , $each['e']['value'] ,  $each['e_id']['value']  ));
  }
}
exit;


}

?>
