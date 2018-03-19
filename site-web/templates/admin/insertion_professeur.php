<?php
<<<<<<< HEAD
    require '../Interactions/Connexion.php';
    require '../Interactions/InteractionsBD.php';
=======

    require '../../../BD/Interactions/Connexion.php';
    require '../../../BD/Interactions/InteractionsBD.php';
>>>>>>> Thang/master

    try{
        $db = connect_database();

        $ID = getMaxIDPersonne($db)+1;
        $Nom = $_POST["Name"];
        $Prenom = $_POST["LastName"];
        $Jury = $_POST["Jury"];

        $stmt1 = $db->prepare("insert into PERSONNE (ID,Nom,Prenom)values (?,?,?);");
        $stmt2 = $db->prepare("insert into PROFESSEUR (IDProf,NumJury) values (?,?);");

        $stmt1->bindParam(1,$ID);
        $stmt1->bindParam(2,$Nom);
        $stmt1->bindParam(3,$Prenom);

        $stmt2->bindParam(1,$ID);
        $stmt2->bindParam(2,$Jury);

        $stmt1->execute();
        $stmt2->execute();
    }
    catch(Exception $e){
        echo $e->getMessage();
    }

    header('Location:InsererProfesseur.php');
?>
