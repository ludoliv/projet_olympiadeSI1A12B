<?php
function destruction(){
  session_start();
  session_unset();
  session_destroy();
  header('Location: connexion.php');
}
destruction();
?>
