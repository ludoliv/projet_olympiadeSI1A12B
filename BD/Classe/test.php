<?php

include '../Interactions/Connexion.php';
include '../Interactions/InteractionsBD.php';
include '../Interactions/ImportCSV.php';
include 'Personne.php';
include 'Eleve.php';
include 'Professeur.php';
include 'Groupe.php';
include 'Jury.php';
include 'Heure.php';
include 'Juge.php';
$connexion = connect_database();

// getCSVforEleve($connexion,'../../csv/eleves.csv');
// getCSVforProf($connexion,'../../csv/Professeur.csv');
// getCSVforGroupe($connexion,'../../csv/Groupe.csv');
// getCSVforJury($connexion,'../../csv/Jury.csv');
// getCSVforHeure($connexion,'../../csv/Horaires.csv');

randomPlanning($connexion);
?>
