<?php
function connect_database()
{
  try
  {
    $file_db = new PDO("mysql:dbname=Olympiade;host=eclegv.fr;port=3306", "Admin", "admin");
    $file_db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    return $file_db;
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }
}

?>
