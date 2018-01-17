<html>
<head>
</head>

<body>
  <?php session_start();
  $_SESSION['connect']=0;
  if(!isset($_SESSION['loginOK'])){
    header('Location: ../protection/connexion.php');
  }?>
  <center><h1>Paramétrage du site</h1></center>
  <h4>Renseignez les champs à mettre à jour :</h4>
  <center>
  <div style="background-color: #72eab4 ; padding: 2%">
    <form method="post" action="insertion_param.php">
    <label for="edition">Édition des Olympiades</label>
    <input type="number" min="1" name="edition"/>

    <br/>

    <label for="date">Date</label>
    <input name="date" type="date"/>

    <br/>

    <label for="sponsors">Sponsors</label>
    <input name="sponsors" type="file"/>

    <br/>

    <label for="illustration">Illustration</label>
    <input name="illustration" type="file"/>

    <br/>

    <input type="submit"/>
    <button id="annuler" type="reset">Annuler</button>
    </form>
  </div>

  </center>

  <script>
    var btn = document.getElementById('annuler');
    btn.onclick = function(){
      document.location.href = "accueil_admin.php";
    };
  </script>
</body>
</html>
