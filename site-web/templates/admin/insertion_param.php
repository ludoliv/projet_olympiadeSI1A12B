<?php
$edition = $_POST['edition'];
$date = $_POST['date'];
$sponsors = $_POST['sponsors'];
$illu = $_POST['illustration'];

function insertParam($edition, $date, $sponsors, $illu){
  echo $edition;
  echo $date;
  echo $sponsors;
  $handle = fopen($_FILES["illustration"]["name"], 'r');
  echo $handle;
}

insertParam($edition, $date, $sponsors, $illu);
?>
