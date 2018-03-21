<!DOCTYPE html>
<html class="h-100">
<head>
<link rel="stylesheet" href="../../css/index.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</head>
<body class="h-100">
<?php session_start();
$_SESSION['connect']=0;
if(!isset($_SESSION['loginOK'])){
  header('Location: ../protection/connexion.php');
}?>
<?php include 'menu_admin.php'; ?>
<h1 id="titre" class="display-5 text-center vignets">Bienvenue, Administrateur</h1>
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
              <img src="../../images_projets/'.$row["image_Projet"].'" width="500px" height="700px">
              <div class="carousel-caption d-none d-md-block bg-dark">
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
              <img src="../../images_projets/'.$row["image_Projet"].'" width="500px" height="700px">
              <div class="carousel-caption d-none d-md-block bg-dark">
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
    interval: 1000
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
