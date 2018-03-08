<?php

require "../Interactions/Connexion.php";
require "../Interactions/InteractionsBD.php";

$database = connect_database();

$id = $_POST['username'];
$mdp = $_POST['mdp'];

$usr = checkLogin($database,$id,$mdp);

if($usr == 'Admin'){
  session_start();
  $_SESSION['loginOK'] = true;
  $_COOKIE['database'] = $database;
  header('Location: ../admin/accueil_admin.php');
}

else if($usr == 'Jury'){
  session_start();
  $_SESSION['loginOK2'] = true;
  header('Location: ../jury/accueil_jury.php');
}
else {
  echo "
  <script>
  alert('Nom d\'utilisateur ou mot de passe incorrect');
  document.location.href = '../protection/connexion.php';
  </script>
  ";
}
?>

<!--
<script>
function afficherEr(){
  $.ajax({
                   url : 'connect.php',
                   type : 'POST',
                   dataType : 'html',
                   success : function(code_html, statut){
                     code_html = "<p> Erreur de mot de passe </p>";
                     $(code_html).appendTo("#erreur");
                   }
                 });


} -->
