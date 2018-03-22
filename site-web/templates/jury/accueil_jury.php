<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../../css/index.css"/>
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<script src="../../jquery-3.2.1.min.js"></script>
<script src="../../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
  <?php session_start();
  $_SESSION['connect']=0;
  if(!isset($_SESSION['loginOK2'])){
    header('Location: connexion.php');
  }?>
  <?php include "menu_jury.php"?>
<center><h1 class="vignets">Bienvenue, jury</h1></center>
<div class="container">
  <div class="carousel slide bg-dark" data-ride="carousel" style="padding-top:1em ; padding-bottom: 1em">
    <h1 class="text-center text-white">Projets de cette année</h1>
    <div class="carousel-inner text-center">
      <?php
      require "../../../BD/Interactions/Connexion.php";
      require "../../../BD/Interactions/InteractionsBD.php";
      $db = connect_database();
      try{
        $cpt = 0;
        $stmt = $db->prepare("SELECT * from GROUPE where image_Projet != 'None'");
        $stmt->execute();
        while($row = $stmt->fetch()){
          if($cpt == 0){
            echo '
            <div class="carousel-item active">
              <img src="../../images_projets/'.$row["image_Projet"].'" height="500px">
              <br>
              <div class=bg-light style=margin-top:15px>
                <h5>'.strtoupper($row["NomProjet"][0]).substr($row["NomProjet"],1,strlen($row["NomProjet"])+1).'</h5>
                <p>'.strtoupper($row["Lycee"][0]).substr($row["Lycee"],1,strlen($row["Lycee"])+1).'</p>
              </div>
            </div>
            ';
            $cpt++;
          }
          else{
            echo '
            <div class="carousel-item">
              <img src="../../images_projets/'.$row["image_Projet"].'" height="500px">
              <div class=bg-light style=margin-top:15px;>
                <h5>'.strtoupper($row["NomProjet"][0]).substr($row["NomProjet"],1,strlen($row["NomProjet"])+1).'</h5>
                <p>'.strtoupper($row["Lycee"][0]).substr($row["Lycee"],1,strlen($row["Lycee"])+1).'</p>
              </div>
            </div>
            ';
          }
        }
      }
      catch(Exception $e){
        $e->getMessage();
      }
      ?>
    </div>
    <a id="prev" class="carousel-control-prev" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a id="next" class="carousel-control-next" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
  $(".carousel").carousel({
    interval: 10000
  });
  $("#titre").addClass("load");
  document.getElementById("prev").onclick = function(){$(".carousel").carousel('prev')}
  document.getElementById("next").onclick = function(){$(".carousel").carousel('next')}
  function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
  }

  function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
  }
});
</script>
</body>
</html>
