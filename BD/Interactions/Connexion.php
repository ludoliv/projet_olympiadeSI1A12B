<?php
function connect_database()
{
  try
  {
    $file_db = new PDO("mysql:dbname=dbcama;host=servinfo-db", "cama", "cama");
    $file_db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    return $file_db;
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }
}

?>
