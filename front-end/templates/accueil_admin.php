<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="index.css"/>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</head>
<body>
<?php session_start();
$_SESSION['connect']=0;
if(!isset($_SESSION['loginOK'])){
  header('Location: connexion.php');
}?>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="accueil_admin.php">Accueil</a>
  <a href="resultats_admin.php">Résultats</a>
  <a href="parametrage.php">Paramétrage</a>
  <a href="planning.php">Planning</a>
  <a href="jury.php">Jury</a>
  <a href="deconnexion.php">Déconnexion</a>
</div>

<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
<center><h1 class="vignets">Bienvenue, administrateur</h1></center>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

$(function() {
      $(".vignets").addClass("load");
});

</script>

</body>
</html>
