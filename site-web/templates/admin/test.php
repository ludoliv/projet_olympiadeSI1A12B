<?php
$selected = $_POST['select'];
// echo "<p>".$selected."</p>";
<<<<<<< HEAD

include '../Interactions/Connexion.php';
=======

include '../../../BD/Interactions/Connexion.php';
>>>>>>> Thang/master

$db = connect_database();
$all_grp = array();
try{
  $stmt = $db->prepare("SELECT NumGroupe FROM GROUPE where NumGroupe != 0");
  $stmt->execute();
  while($row = $stmt->fetch()){
    array_push($all_grp,$row['NumGroupe']);
  }
}
catch(Exception $e){}

for($i=0; $i<sizeof($all_grp)+1; $i++) {
  if($all_grp[$i] == $selected){
    unset($all_grp[$i]);
  }
  //echo "<p>".$all_grp[$i]."</p>";
}

echo "<option value='none'></option>";
  foreach ($all_grp as $num) {
    if ($num != $_POST["select"]){
      echo "<option value='".$num."'>Bonjour ".$num."</option>";
    }
  }

?>
