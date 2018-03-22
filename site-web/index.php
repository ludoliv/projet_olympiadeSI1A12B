<!DOCTYPE html>
<html class="h-100">
<head>
  <link rel="stylesheet" type="text/css" href="./css/index.css"/>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="jquery-3.2.1.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <base href="templates/protection/">
</head>
<body class="h-100">
  <?php
  include '../BD/Interactions/Connexion.php';
  $db = connect_database();

  $statement = $db->prepare("SELECT * from OLYMPIADES");
  $statement->execute();

  while($row = $statement->fetch()){
    $numEdition = $row["NumEdition"];
    $LogOlympiades = $row["LogOlympiades"];
    $LogoSponsor = $row["LogoSponsor"];
    $LogoUPSTI = $row["LogoUPSTI"];
    $LogoIUT = $row["LogoIUT"];
    $dateBD = $row["datetimeOlymp"];
    $bandeau = $row["BandeauPartenaires"];

  }

  $lesMois = ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"];

  $annee = explode("-", $dateBD)[0];
  $mois = $lesMois[intval(explode("-", $dateBD)[1])];
  $jour = explode(" ", explode("-", $dateBD)[2])[0];

  $date = $jour." ".$mois." ".$annee;

  ?>

  <div class="container-fluid h-100" style="padding-bottom: 13%">

    <div class="row justify-content-start">
      <div class="col-2">
        <div id="mySidenav" class="sidenav">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <a href="../../index.php">Accueil</a>
          <a href="connexion.php">Connexion</a>
        </div>

        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>
      </div>

      <div class="col-2 media" id="sponsor">
        <img style="height:100px" src="<?php
        echo '../../images/'.$LogoSponsor;
        ?>"
        />
      </div>

      <div class="col-4" style="text-align:center">
        <h1><?php echo "Olympiades n°".$numEdition;?></h1>
        <h5 id="date"><?php echo $date;?></h5>
      </div>

      <div class="col-2">
        <div class="media" id="upsti">
          <img  style="height:100px" src="<?php
          echo '../../images/'.$LogoUPSTI;
          ?>"/>
        </div>
      </div>

      <div class="col-2">
        <div class="media" id="iut">
          <img style="height:100px" src="<?php
          echo '../../images/'.$LogoIUT;
          ?>"/>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="media" id="olymp">
        <img style="height:500px" src="<?php
        echo '../../images/'.$LogOlympiades;
        ?>"/>
      </div>
    </div>

    <div class="media" id="bandeau">
      <img style="height:100px; display: block; margin-left: auto; margin-right: auto;" src="<?php
      echo '../../images/'.$bandeau;
      ?>"/>
    </div>


  </div>

  <script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
  </script>
</body>
</html>
