<?php
include 'Interactions/Connexion.php';
include 'Interactions/InteractionsBD.php';
include 'Interactions/Note.php';
include 'Interactions/Donne.php';

$listeNote = $_POST['Note'];
$listeDonne = $_POST['Donne'];

$NoteAInserer = array();
$DonneAInserer = array();


$IDNOTE = getMaxIDNote($connexion) + 1;
for($i = 0; i < count($listeNote); $i++)
{
    $prototype = $listeNote[$i][1];
    $originalite = $listeNote[$i][2];
    $demarcheSI = $listeNote[$i][3];
    $pluriDisciplinarite = $listeNote[$i][4];
    $maitrise = $listeNote[$i][5];
    $devDurable = $listeNote[$i][6];

    $Note = new Note($IDNOTE,$prototype,$originalite,$demarcheSI,$pluriDisciplinarite,$maitrise,$devDurable);

    array_push($NoteAInserer,$Note);
    $IDNOTE++;
}

$IDDONNE = getMaxIDDonne($connexion)+1;

for($i = 0; i < count($listeDonne); $i++)
{
    $NumJury = $listeDonne[$i][0];
    $NumGroupe = $listeDonne[$i][1];

    $Donne = new Donne($NumJury,$NumGroupe,$IDDONNE);
    array_push($DonneAInserer,$Donne);
    $IDDONNE++;
}

insertNote($connexion,$NoteAInserer);
insertDonne($connexion,$DonneAInserer);
?>