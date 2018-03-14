<?php
    require '../Interactions/Connexion.php';
    require '../Interactions/InteractionsBD.php';
    require '../Interactions/ImportCSV.php';

    try{
        $db = connect_database();
        getCSVforJury($db,$_POST["path"]);
    }
    catch(Exception $e){
        echo $e->getMessage();
    }

    header('Location:insererJury.php');
?>
