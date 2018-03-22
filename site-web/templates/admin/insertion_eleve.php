<?php
    require '../../../BD/Interactions/Connexion.php';
    require '../../../BD/Interactions/InteractionsBD.php';

    try{
        $db = connect_database();

        $ID = getMaxIDPersonne($db)+1;
        $Nom = $_POST["Name"];
        $Prenom = $_POST["LastName"];
        $Filiere = $_POST["Filiere"];
        $Grp = $_POST["Groupe"];

        echo $ID;
        echo $Nom;

        $stmt1 = $db->prepare("insert into PERSONNE (ID,Nom,Prenom)values (?,?,?);");
        $stmt2 = $db->prepare("insert into ELEVE (IDEleve,Filiere,NumGroupe) values (?,?,?);");

        $stmt1->bindParam(1,$ID);
        $stmt1->bindParam(2,$Nom);
        $stmt1->bindParam(3,$Prenom);

        $stmt2->bindParam(1,$ID);
        $stmt2->bindParam(2,$Filiere);
        $stmt2->bindParam(3,$Grp);

        $stmt1->execute();
        $stmt2->execute();
    }
    catch(Exception $e){
        echo $e->getMessage();
    }

    header('Location:InsererEleve.php');
?>
