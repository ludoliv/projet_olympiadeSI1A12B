<?php
function connect_database()
{

  try
  {
    $database = new PDO('mysql:host=sql.hebergeur.com;dbname=mabase;charset=utf8', 'bouny', 's3cr3t');
    $database -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $e)
  {
      printf("Échec de la connexion : %s\n", $e -> getMessage());
      exit();
  }
  return $database;
}

?>
