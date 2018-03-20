<?php
  include("PDOConnection.php");

  $data=$_POST['data'];

  $data_decode=json_decode($data);

  $resultat=insererNote($data_decode)+insererDonne($data_decode);
  echo json_encode(array("resultat"=>$resultat));

  function insererNote($data){
    $query = "REPLACE INTO my_table (idNote,prototype,originalite,DemarcheScientifique,pluriDisciplinarite,MaitriseScientifique,Communication) VALUES (?,?,?,?,?,?,?)";
    for($i=0;$i<=length($data_decode['Notes']);$i++){
      $stmt = $cnn->prepare($query);
      $stmt->bindParam(1, $data_decode['Notes'][$i][0]);
      $stmt->bindParam(2, $data_decode['Notes'][$i][1]);
      $stmt->bindParam(3, $data_decode['Notes'][$i][2]);
      $stmt->bindParam(4, $data_decode['Notes'][$i][3]);
      $stmt->bindParam(5, $data_decode['Notes'][$i][4]);
      $stmt->bindParam(6, $data_decode['Notes'][$i][5]);
      $stmt->bindParam(7, $data_decode['Notes'][$i][6]);
      $stmt->execute();
    }
    return 0.5;
  }
  function insererDonne($data){
    $query = "INSERT INTO table (NumJury, NumGroupe, idNote) VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE id = id";
    for($i=0;$i<=length($data_decode['Donne']);$i++){
      $stmt = $cnn->prepare($query);
      $stmt->bindParam(1, $data_decode['Donne'][$i][0]);
      $stmt->bindParam(2, $data_decode['Donne'][$i][1]);
      $stmt->bindParam(3, $data_decode['Donne'][$i][2]);
      $stmt->execute();
    }
    return 0.5;
  }
  /* Donne INSERT INTO table (a, b, c)
    VALUES (1, 45, 6)
    ON DUPLICATE KEY UPDATE id = id
  */
  /* Note REPLACE INTO my_table (pk_id, col1) VALUES (5, '123');*/
?>
