<?php

$name = $_GET['name'];
$value = $_GET['value'];

include '../../../BD/Interactions/Connexion.php';
include '../../../BD/Interactions/InteractionsBD.php';
include '../../../BD/Classe/Groupe.php';

$db = connect_database();

if(strlen($name) == 2)
{
    $idHeure = intval($name[0]);
    $idJury = intval($name[1]);
}
elseif(strlen($name) == 3)
{
    $IDMaxJury = getMaxIDJURY($db);
    if($IDMaxJury >= 10)
    {
        $idHeure = intval($name[0]);
        $idJury = intval($name[1]+$name[2]);
    }
    else
    {
        $idHeure = intval($name[0]+$name[1]);
        $idJury = intval($name[2]);
    }
}
else
{
    $idHeure = intval($name[0]+$name[1]);
    $idJury = intval($name[2]+$name[3]);
}

if($value == "none")
{
    $statement = $db->prepare("DELETE FROM JUGE WHERE idHeure=? and NumJury=?");
    $statement->bindParam(1,$idHeure);
    $statement->bindParam(2,$idJury);
    $statement->execute();

    echo "Suppression réussie";
}
else
{
    $idGroupe = intval($value);
    $query = "SELECT NumJury,idHeure FROM JUGE where NumGroupe=?";
    $statement = $db->prepare($query);
    $statement->bindParam(1,$idGroupe);
    $statement->execute();

    $query2 = "SELECT NumJury,NumGroupe FROM JUGE where idHeure=?";
    $statement1 = $db->prepare($query2);
    $statement1->bindParam(1,$idHeure);
    $statement1->execute();

    $valid = 1;
    while ($row = $statement->fetch())
    {
        if($row['idHeure'] == $idHeure)
        {
            $valid = 2;
            break;
        }
        elseif($row['NumJury'] == $idJury)
        {
          $valid = 3;
          break;
        }
    }

    while ($row = $statement1->fetch())
    {
        if($row['NumJury'] == $idJury && $row['NumGroupe']!= $idGroupe && $valid == 1)
        {
            $valid = 4;
        }
    }

    if($valid == 1)
    {
          $stmt1 = $db->prepare("SELECT numSalle FROM GROUPE WHERE NumGroupe=?");
          $stmt1->bindParam(1,$idGroupe);
          $stmt1->execute();
          $salle = $stmt1->fetch();

          $stmt = $db->prepare("INSERT INTO JUGE (idHeure,NumJury,NumGroupe,numSalle) VALUES(?,?,?,?)");
          $stmt->bindParam(1,$idHeure);
          $stmt->bindParam(2,$idJury);
          $stmt->bindParam(3,$idGroupe);
          $stmt->bindParam(4,$salle['numSalle']);
          $stmt->execute();
          echo "Insertion réussie";
    }
    elseif($valid == 2)
    {
        echo "Impossible car ce groupe est déjà évalué à cette horaire";
    }
    elseif($valid == 4)
    {
        $stmt1 = $db->prepare("DELETE FROM JUGE WHERE idHeure=? and NumJury=?");
        $stmt1->bindParam(1,$idHeure);
        $stmt1->bindParam(2,$idJury);
        $stmt1->execute();
        $salle = $stmt1->fetch();

        $statement = $db->prepare("INSERT INTO JUGE (idHeure,NumJury,NumGroupe,numSalle) VALUES(?,?,?,?)");
        $statement->bindParam(1,$idHeure);
        $statement->bindParam(2,$idJury);
        $statement->bindParam(3,$idGroupe);
        $statement->bindParam(4,$salle['numSalle']);
        $statement->execute();

        echo "Assignation réussie";
    }
    else {
        echo "Impossible car ce jury évalue déjà ce groupe dans la journée";
    }
}
?>
