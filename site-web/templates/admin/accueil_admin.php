<<<<<<< HEAD
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../../css/index.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</head>
<body>
<?php session_start();
$_SESSION['connect']=0;
if(!isset($_SESSION['loginOK'])){
  header('Location: ../protection/connexion.php');
}?>
<?php include 'menu_admin.php'; ?>

<center><h1 class="vignets">Bienvenue, administrateur</h1></center>
<center>
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width: 75% ; margin-top: 5%">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="http://www.unesourisetmoi.info/wall31/images/fonds-ecran-paysage_10.jpg" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="http://www.unesourisetmoi.info/wall31/images/fonds-ecran-paysage_05.jpg" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="http://iwallpapers2.free.fr/images/Paysages/Hiver/Magnifique_fond_ecran_HD_-_Hiver.jpg" alt="Third slide">
      </div>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</center>

<script>

$(function() {
      $(".vignets").addClass("load");
});

$(function(){
  $('.carousel').carousel()
  $('.carousel').carousel({
    interval: 10
  })
})
</script>

</body>
</html>
=======
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../../css/index.css"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</head>
<body>
<?php session_start();
$_SESSION['connect']=0;
if(!isset($_SESSION['loginOK'])){
  header('Location: ../protection/connexion.php');
}?>
<?php include 'menu_admin.php'; ?>

<h1 class="vignets text-center">Bienvenue, administrateur</h1>

<script>

$(function() {
      $(".vignets").addClass("load");
});

$(function(){
  $('.carousel').carousel()
  $('.carousel').carousel({
    interval: 10
  })
})
</script>

</body>
</html>
>>>>>>> glang/master
