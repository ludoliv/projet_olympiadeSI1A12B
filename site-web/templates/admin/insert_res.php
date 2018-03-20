<?php

require '../../../BD/Interactions/Connexion.php';
require '../../../BD/Interactions/InteractionsBD.php';

$database = connect_database();

$originalite = $_POST['originalite'];
$prototype = $_POST['prototype'];
$demarche_si = $_POST['demarche_si'];
$pluridisciplinarite = $_POST['pluridisciplinarite'];
$maitrise = $_POST['maitrise'];
$dev_dur = $_POST['developpement_durable'];
$moyenne = $_POST['moyenne'];

// echo $originalite;
// echo $prototype;
// echo $demarche_si;
// echo $pluridisciplinarite;
// echo $maitrise;
// echo $dev_dur;
// echo $moyenne;

/**
 * Cette fonction met à jour les groupe auxquels sont assignés
 * les récompenses en mettant leur valeurs à NULL.
 * 
 * @author Quentin Bouny
 * 
 * @param PDO $connexion Connexion avec la base de données.
 * 
 */
function clear_assignement($connexion)
{
  /**
   * 
   * @var PDOStatement $stmt Résultat de la requête en base de données.
   * @var PDOStatement $stmt2 Résultat de la requête en base de données.
   */
  try{
    $stmt = $connexion->prepare("SELECT idRecompense from RECOMPENSE");
    $stmt2 = $connexion->prepare("UPDATE RECOMPENSE SET idGroupe=NULL where idRecompense=?");

    $stmt->execute();

    while($row = $stmt->fetch())
    {
      $stmt2->bindParam(1,$row["idRecompense"]);
      $stmt2->execute();
    }
  }
  catch(Exception $e)
  {
    echo $e->getMessage();
  }
}

/**
 * Cette fonction permet d'assigner au groupe choisi dans la page resultats_admin.php
 * une récompense.
 * 
 * @author Vincent Deschamps
 * 
 * @param PDO $connexion Connexion avec la base de données.
 * @param Integer $originalite ID du groupe auquel on veut assigner la récompense sur l'originalité.
 * @param Integer $prototype ID du groupe auquel on veut assigner la récompense sur le prototype.
 * @param Integer $demarche_si ID du groupe auquel on veut assigner la récompense sur la démarche SI.
 * @param Integer $pluridisciplinarite ID du groupe auquel on veut assigner la récompense sur la pluri-disciplinarité.
 * @param Integer $maitrise ID du groupe auquel on veut assigner la récompense sur la maitrise.
 * @param Integer $dev_dur ID du groupe auquel on veut assigner la récompense sur le développement durable.
 * @param Integer $moyenne ID du groupe auquel on veut assigner la récompense sur la moyenne générale.
 * 
 * 
 */
function insertion($connexion, $originalite, $prototype, $demarche_si, $pluridisciplinarite, $maitrise, $dev_dur, $moyenne){
  /**
   * @var PDOStatement $stmt Requête préparée à envoyer en base de donées.
   * @var PDOStatement $stmt2 Requête préparée à envoyer en base de données.
   */
  try{
    $stmt = $connexion->prepare("UPDATE RECOMPENSE SET idGroupe=? where idRecompense=?");

    $stmt2 = $connexion->prepare("select * from DONNE natural join NOTE where NumGroupe=?");

    if($originalite != "none"){
      $stmt2->bindParam(1,$originalite);
      $stmt2->execute();

      if(testNote($connexion,$stmt2,$originalite,"originalite"))
      {
        $stmt->bindParam(1,$originalite);
        $stmt->bindValue(2,1);
        $stmt->execute();
      }
    }
    else{
      $stmt->bindValue(1,NULL);
      $stmt->bindValue(2,1);
      $stmt->execute();
    }

    if($prototype != "none"){
      $stmt2->bindParam(1,$prototype);
      $stmt2->execute();

      if(testNote($connexion,$stmt2,$prototype,"prototype"))
      {
      $stmt->bindParam(1,$prototype);
      $stmt->bindValue(2,2);
      $stmt->execute();
      }
    }
    else{
      $stmt->bindValue(1,NULL);
      $stmt->bindValue(2,2);
      $stmt->execute();
    }

    if($demarche_si != "none"){
      $stmt2->bindParam(1,$demarche_si);
      $stmt2->execute();

      if(testNote($connexion,$stmt2,$demarche_si,"DemarcheScientifique"))
      {
        $stmt->bindParam(1,$demarche_si);
        $stmt->bindValue(2,3);
        $stmt->execute();
      }
    }
    else{
      $stmt->bindValue(1,NULL);
      $stmt->bindValue(2,3);
      $stmt->execute();
    }

    if($pluridisciplinarite != "none"){
      $stmt2->bindParam(1,$pluridisciplinarite);
      $stmt2->execute();

      if(testNote($connexion,$stmt2,$pluridisciplinarite,"pluriDisciplinarite"))
      {
        $stmt->bindParam(1,$pluridisciplinarite);
        $stmt->bindValue(2,4);
        $stmt->execute();
      }
    }
    else{
      $stmt->bindValue(1,NULL);
      $stmt->bindValue(2,4);
      $stmt->execute();
    }

    if($maitrise != "none"){
      $stmt2->bindParam(1,$maitrise);
      $stmt2->execute();

      if(testNote($connexion,$stmt2,$maitrise,"MaitriseScientifique"))
      {
        $stmt->bindParam(1,$maitrise);
        $stmt->bindValue(2,5);
        $stmt->execute();
      }
    }
    else{
      $stmt->bindValue(1,NULL);
      $stmt->bindValue(2,5);
      $stmt->execute();
    }

    if($dev_dur != "none"){
      $stmt2->bindParam(1,$dev_dur);
      $stmt2->execute();

      if(testNote($connexion,$stmt2,$dev_dur,"Communication"))
      {
        $stmt->bindParam(1,$dev_dur);
        $stmt->bindValue(2,6);
        $stmt->execute();
      }
    }
    else{
      $stmt->bindValue(1,NULL);
      $stmt->bindValue(2,6);
      $stmt->execute();
    }

    if($moyenne != "none"){
      $note = getNote($connexion,$moyenne);
      if(($note["Prototype"] >= 0) and ($note["Originalite"] >= 0) and ($note["DemarcheSI"] >= 0) and ($note["pluriDisciplinarite"] >= 0) and ($note["devDurable"] >= 0) and ($note["Maitrise"]>=0))
      {
        $stmt->bindParam(1,$moyenne);
        $stmt->bindValue(2,7);
        $stmt->execute();
      }
    }
    else{
      $stmt->bindValue(1,NULL);
      $stmt->bindValue(2,7);
      $stmt->execute();
    }
  }
  catch(Exception $e){
    echo $e.getMessage();
  }
}

clear_assignement($database);
insertion($database, $originalite, $prototype, $demarche_si, $pluridisciplinarite, $maitrise, $dev_dur, $moyenne);
header('Location: resultats_admin.php');


/**
 * Cette fonction test si le groupe passé en paramètre
 * peut être assigné à une récompense suivant certain critères:
 *  - Une seule récompense par groupe
 *  - Deux récompenses par lycée
 * 
 * @author Quentin Bouny
 * 
 * @param PDO $connexion Connexion avec la base de données.
 * @param PDOStatement $statement Résultat d'une requête réalisé dans la fonction insertion()
 * @param Integer $grp Numéro du groupe auquel on veut assigner une récompense
 * @param Sring $categorie Categorie à laquelle on veut assigner le groupe
 */
function testNote($connexion,$statement,$grp,$categorie){
  /**
   * @var PDOStatement $stmt Réponse de la requête en base de données.
   */
  try{
    $stmt = $connexion->prepare("SELECT Lycee FROM GROUPE WHERE NumGroupe in (SELECT idGroupe from RECOMPENSE)");
    while($row = $statement->fetch())
    {
      if($row[$categorie] >= 0)
      {
        if ($categorie === "originalite")
        {
          return true;
        }
        echo "Groupe:".$grp."<br>";
        $stmt->execute();

        $cpt = 0;
        while ($row = $stmt->fetch())
        {
          $cpt++;
        }

        if($cpt < 2)
        {
          return true;
        }
      }
    }
    return false;
  }
  catch(Exception $e){
    echo $e->getMessage();
  }
}
?>
