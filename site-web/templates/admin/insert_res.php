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
echo $originalite;
echo $prototype;
echo $demarche_si;
echo $pluridisciplinarite;
echo $maitrise;
echo $dev_dur;
echo $moyenne;
function clear_assignement($connexion)
{
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
function insertion($connexion, $originalite, $prototype, $demarche_si, $pluridisciplinarite, $maitrise, $dev_dur, $moyenne){
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
function testNote($connexion,$statement,$grp,$categorie){
  /**
   * @author : Quentin Bouny
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

        $stmt2 = $connexion->prepare("SELECT * FROM GROUPE WHERE NumGroupe=?");
        $stmt2->bindParam(1,$grp);
        $stmt2->execute();

        $Groupe = $stmt2->fetch();

        $cpt = 0;
        while ($row = $stmt->fetch())
        {
          if($row['Lycee'] == $Groupe['Lycee'])
          {
            $cpt++;
          }
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
  }
}
?>

