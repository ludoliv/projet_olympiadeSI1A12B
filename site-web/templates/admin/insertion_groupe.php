<?php
    require '../Interactions/Connexion.php';
    require '../Interactions/InteractionsBD.php';

    try{
        $db = connect_database();

        $ID = getMaxIDGROUPE($db)+1;
        $Nom = $_POST["Name"];
        $Lycee = $_POST["lycee"];
        $num = $_POST["num"];
        $img = $_POST["img"];

        echo $num;
    
        $stmt1 = $db->prepare("insert into GROUPE (NumGroupe,NomProjet,Lycee,numSalle,image_Projet) values (?,?,?,?,?);");
    
        $stmt1->bindParam(1,$ID);
        $stmt1->bindParam(2,$Nom);
        $stmt1->bindParam(3,$Lycee);
        $stmt1->bindParam(4,$num);
        $stmt1->bindParam(5,$img);
    
        $stmt1->execute();
    }
    catch(Exception $e){
        echo $e->getMessage();
    }

    header('Location:InsererGroupe.php');9
?>