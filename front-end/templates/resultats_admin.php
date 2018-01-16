<html>
<head>
  <link rel="stylesheet" href="index.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
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
  <center><h1>Résultats finaux</h1></center>

  <div style="padding: 5%">
  <table class="table table-striped" style="text-align: center;">
    <thead class="thead-dark">
    <tr>
      <th>Équipe</th>
      <th>Originalité</th>
      <th>Prototype</th>
      <th>Démarche SI</th>
      <th style="margin: 10%">Pluridisciplinarité</th>
      <th>Maîtrise</th>
      <th>Développement Durable</th>
      <th>Moyenne</th>
    </tr>
    </thead>
  <?php
    for($i=1; $i<11;$i++){
      echo "<tr>";
      for($j=1;$j<9;$j++){
        echo "<td>".$i."</td>";
      }
      echo "</tr>";
    }
  ?>
  </table>
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
