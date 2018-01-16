<?php

include '../Interactions/Connexion.php';
include '../Interactions/InteractionsBD.php';
include '../Interactions/ImportCSV.php';
include 'Personne.php';
include 'Eleve.php';
$connexion = connect_database();

getCSVForEleve($connexion,"../../eleves.csv");


?>
