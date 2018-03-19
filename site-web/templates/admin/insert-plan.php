<?php

require "../../../BD/Interactions/Connexion.php";

$database = connect_database();

function insert_task($db,$jury,$grp,$date,$heure){
  try{
    $stmt = $db->prepare("INSERT INTO JUGE VALUES(?,?,?,?)");

    $stmt->bindValue(1,$heure);
    $stmt->bindValue(2,$jury);
    $stmt->bindValue(3,$grp);
    $stmt->bindValue(4,);

    $stmt->execute();
  }
  catch(Exception $e){
    echo $e.getMessage();
  }
}

insert_task($database, $_POST["jury_id"], $_POST["grp_id"], $_POST["date_id"], $_POST["heure_id"]);
 ?>
