<?php
$dbName = "dbbouny";
$host = "servinfo-db";
/*TODO changer les données si installations sur un autre pc*/
$user = "bouny";
$pwd = "bouny";
$cnn = new PDO('mysql:dbname='.$dbName.';host='.$host, $user, $pwd);
$cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);