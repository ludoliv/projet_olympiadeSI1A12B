<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../../css/index.css"/>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</head>
<body>
  <?php session_start();
  $_SESSION['connect']=0;
  if(!isset($_SESSION['loginOK2'])){
    header('Location: connexion.php');
  }?>
  <?php include "menu_jury.php"?>
<center><h1 class="vignets">Bienvenue, jury</h1></center>

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
