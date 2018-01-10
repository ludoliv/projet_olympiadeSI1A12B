<?php

function getCSV($filename){
    $row = 1;
    $handle = fopen($filename,"r");
    $tabE = [];
    $tabP = [];
    $id = 1;
    while(($data = fgetcsv($handle, 1000, ",")) !== FALSE){
         $num = count($data);
         for ($c=0; $c < $num; $c++)
         {
           $p = new Personne($id,$data[0],$data[1]);
           $e = new Eleve($id,$data[2]);
           $tabE[$id-1] = $e;
           $tabP[$id-1] = $p;
         }
         $row++;
         $id++;
    }

    for($i = 0;$i < $row-1;$i++)
    {
      $Personne = $tabP[$i];
      echo $Personne->getNom();
    }
    fclose($handle);
}

?>
