<?php
// include bd

$id = $_POST['username'];
$mdp = $_POST['mdp'];

if($id == "admin" && $mdp == "admin"){
  session_start();
  $_SESSION['loginOK'] = true;
  header('Location: accueil_admin.php');
}

else if($id == "jury" && $mdp == "jury"){
  session_start();
  $_SESSION['loginOK2'] = true;
  header('Location: accueil_jury.php');
}

else{
  echo "
  <script>
  document.location.href = 'connexion.php';
  alert('Nom d\'utilisateur ou mot de passe incorrect');
  </script>
  ";
}
?>
