<?php

require "../Interactions/Connexion.php";

$database = connect_database();

function getNbTotalJury($db){
  $nbJury = null;
  try{
    $stmt = $db->prepare("SELECT count(*) nbTotal FROM JURY");
    $stmt->execute();

    while($row = $stmt->fetch()){
      $nbJury = $row['nbTotal'];
    }
  }
  catch(Exception $e){
    echo $e.getMessage();
  }

  return $nbJury;
}

function getNbTotalHeure($db){
  $nbH = null;
  try{
    $stmt = $db->prepare("SELECT count(*) nbTotal FROM HEURE");
    $stmt->execute();

    while($row = $stmt->fetch()){
      $nbH = $row['nbTotal'];
    }
  }
  catch(Exception $e){
    echo $e.getMessage();
  }

  return $nbH;
}

function insertion($db){
  $nbJury = getNbTotalJury($db);
  $nbH = getNbTotalHeure($db);

  for($i=0; $i<($nbJury*$nbH)-$nbJury; $i++){
    // print_r($i%$nbJury);
    if($_POST['select'.$i] != 'none'){
      echo "lel";
    }
  }
}
// print_r(getNbTotalJury($database)*getNbTotalHeure($database)-getNbTotalJury($database));
insertion($database);
?>
