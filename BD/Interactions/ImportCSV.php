<?php

function getCSV($filename){
    $row = 1;
    $handle = fopen($filename,"r");
    while(($data = fgetcsv($handle, 1000, ",")) !== FALSE){
        $num = count($data);
        echo "<br /><br /><p> $num champs à la ligne $row:</p>";
         $row++;
         for ($c=0; $c < $num; $c++):
            echo $data[$c] . " | ";
         endfor;
     
    }
    fclose($handle);
}

?>