<?php

require '../Interactions/Connexion.php';

$database = connect_database();

$originalite = $_POST['originalite'];
$prototype = $_POST['prototype'];
$demarche_si = $_POST['demarche_si'];
$pluridisciplinarite = $_POST['pluridisciplinarite'];
$maitrise = $_POST['maitrise'];
$dev_dur = $_POST['developpement_durable'];
$moyenne = $_POST['moyenne'];

echo $originalite;
echo $prototype;
echo $demarche_si;
echo $pluridisciplinarite;
echo $maitrise;
echo $dev_dur;
echo $moyenne;

function insertion($connexion, $originalite, $prototype, $demarche_si, $pluridisciplinarite, $maitrise, $dev_dur, $moyenne){
  try{
    $stmt = $connexion->prepare("UPDATE RECOMPENSE SET idGroupe=? where idRecompense=?");

    if($originalite != "none"){
      $stmt->bindParam(1,$originalite);
      $stmt->bindValue(2,0);
      $stmt->execute();
    }

    if($prototype != "none"){
      $stmt->bindParam(1,$prototype);
      $stmt->bindValue(2,1);
      $stmt->execute();
    }

    if($demarche_si != "none"){
      $stmt->bindParam(1,$demarche_si);
      $stmt->bindValue(2,2);
      $stmt->execute();
    }

    if($pluridisciplinarite != "none"){
      $stmt->bindParam(1,$pluridisciplinarite);
      $stmt->bindValue(2,3);
      $stmt->execute();
    }

    if($maitrise != "none"){
      $stmt->bindParam(1,$maitrise);
      $stmt->bindValue(2,4);

      $stmt->execute();
    }

    if($dev_dur != "none"){
      $stmt->bindParam(1,$dev_dur);
      $stmt->bindValue(2,5);
      $stmt->execute();
    }

    if($moyenne != "none"){
      $stmt->bindParam(1,$moyenne);
      $stmt->bindValue(2,6);
      $stmt->execute();
    }
  }
  catch(Exception $e){
    echo $e.getMessage();
  }
}

insertion($database, $originalite, $prototype, $demarche_si, $pluridisciplinarite, $maitrise, $dev_dur, $moyenne);
header('Location: accueil_admin.php');
?>
