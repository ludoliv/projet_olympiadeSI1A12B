<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../../css/index.css"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
</head>
<body>
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="../../index.html">Accueil</a>
    <a href="connexion.php">Connexion</a>
  </div>

  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu</span>

  <script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
  </script>

  <div style="padding-left: 20% ; padding-right: 20% ; padding-top: 10% ;">
    <center><h1 style="background-color: #72eab4 ; padding:2%">Authentification</h1></center>

    <form id="needs-validation" method="POST" action="connect.php" novalidate>
      <div class="form-row">
        <div class="col-md-12 mb-3">
          <label for="validationCustom01">Nom d'utilisateur</label>
          <input type="text" class="form-control" id="validationCustom01" placeholder="Nom d'utilisateur" name="username" required>
          <div class="invalid-feedback">
            Veuillez renseigner un nom d'utilisateur.
          </div>
        </div>
        <div class="col-md-12 mb-3">
          <label for="validationCustom02">Mot de passe</label>
          <input type="password" class="form-control" id="validationCustom02" placeholder="Mot de passe" name="mdp" required>
          <div id="erreurMDP" class="invalid-feedback">
            Veuillez renseigner un mot de passe.
          </div>
        </div>
      </div>
      <div id="erreur">
      </div>
      <center><button class="btn btn-primary" type="submit">Connexion</button></center>
    </form>
  </div>
  <script>
  (function() {
    'use strict';

    window.addEventListener('load', function() {
      var form = document.getElementById('needs-validation');
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    }, false);
  })();

  </script>
</body>
</html>
