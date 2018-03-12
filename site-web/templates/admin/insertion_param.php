<<<<<<< HEAD
<?php
$edition = $_POST['edition'];
$date = $_POST['date'];
$sponsors = $_POST['sponsors'];
$illu = $_POST['illustration'];

echo $edition . " " . $date . " " . $sponsors . " " . $illu ;
?>
=======
<?php
$edition = $_POST['edition'];
$date = $_POST['date'];
$sponsors = $_POST['sponsors'];
$illu = $_POST['illustration'];

function insertParam($edition, $date, $sponsors, $illu){
  echo $edition;
  echo $date;
  echo $sponsors;
  echo $illu;
}

insertParam($edition, $date, $sponsors, $illu);
?>
>>>>>>> glang/master
