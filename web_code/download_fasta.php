<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $uniquenames_str = $_POST["uniquenames"];
  $uniquenames= array_unique (explode(",", $uniquenames_str));

  $result = db_query('select uniquename, name, residues from {chado.feature} where uniquename in  (:uniquenames)' , array(':uniquenames' => $uniquenames ));

  $filename = "sequenes.fasta";
  $fp = fopen('php://output', 'w');
  header('Content-type: text');
  header('Content-Disposition: attachment; filename='.$filename);

  foreach ($result as $seq) {
    print ">$seq->uniquename $seq->name\n$seq->residues\n";
  }
  exit;
}

?>
