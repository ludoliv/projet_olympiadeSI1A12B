<?php

function getCSVForEleve($connexion,$filename){
    $row = 1;
    $handle = fopen($filename,"r");
    $tabE = array();
    $tabP = array();
    $id = getMaxIDPersonne($connexion)+1;
    while(($data = fgetcsv($handle, 1000, ",")) !== FALSE)
    {
         $num = count($data);
         for ($c=0; $c < $num; $c++)
         {
           $p = new Personne($id,$data[0],$data[1]);
           $e = new Eleve($id,$data[2],$data[3]);
           if (test($tabP,$id))
           {
             break;
           }
           else
           {
            array_push($tabP,$p);
            array_push($tabE,$e);
           }
         }
         $row++;
         $id++;
    }
    insertPersonne($connexion,$tabP);
    insertEleve($connexion,$tabE);
    fclose($handle);
}

function test($Liste,$id)
{
  foreach ($Liste as $p)
  {
    if ($p->getiD() == $id)
    {
      return true;
    }
  }
  return false;
}

?>
