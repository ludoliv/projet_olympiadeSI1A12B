<?php
    require '../../../BD/Interactions/Connexion.php';
    require '../../../BD/Interactions/InteractionsBD.php';
    require '../../../BD/Interactions/ImportCSV.php';

    try{
        $db = connect_database();
        getCSVforJury($db,$_POST["path"]);
    }
    catch(Exception $e){
        echo $e->getMessage();
    }

    header('Location:insererJury.php');
?>
