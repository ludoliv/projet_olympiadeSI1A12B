<?php

function getCSVforEleve($connexion,$filename)
{
    $handle = fopen($filename,"r");
    $tabPersonne = array();
    $tabE = array();
    $tabP = array();
    $id = getMaxIDPersonne($connexion)+1;
    while(($data = fgetcsv($handle, 1000, ",")) !== FALSE)
    {
        $Nom = $data[0];
        $Prenom = $data[1];
        $Filiere = $data[2];
        $NumGroupe = $data[3];

        $p = new Personne($id,$Nom,$Prenom);
        $e = new Eleve($id,$Filiere,$NumGroupe);

        if (!testPInListe($tabP,$p->getiD())) {
            array_push($tabP,$p);
            array_push($tabE,$e);
            $id++;
        }
    }

    insertPersonne($connexion,$tabP);
    insertEleve($connexion,$tabE);
    fclose($handle);
}

function testPInListe($Liste,$id)
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

function getCSVforProf($connexion,$filename)
{
    $handle = fopen($filename,"r");
    $tabPersonne = array();
    $tabPers = array();
    $tabProf = array();
    $id = getMaxIDPersonne($connexion)+1;
    while(($data = fgetcsv($handle, 1000, ",")) !== FALSE)
    {
        $Nom = $data[0];
        $Prenom = $data[1];
        $NumJury = $data[2];

        $p = new Personne($id,$Nom,$Prenom);
        $e = new Professeur($id,$NumJury);

        if (!testPInListe($tabPers,$p->getiD())) {
            array_push($tabPers,$p);
            array_push($tabProf,$e);
            $id++;
        }
    }

    insertPersonne($connexion,$tabPers);
    insertProf($connexion,$tabProf);
    fclose($handle);
}

function getCSVforGroupe($connexion,$filename)
{
    $handle = fopen($filename,"r");
    $tabGroupe = array();
    $id = getMaxIDGROUPE($connexion)+1;
    while(($data = fgetcsv($handle, 1000, ",")) !== FALSE)
    {
        $Nom = $data[0];
        $Lycee = $data[1];
        $chemin = $data[2];

        $g = new Groupe($id,$Nom,$Lycee,$chemin);

        if (!testPInListeG($tabGroupe,$g->getNumGroupe())) {
            array_push($tabGroupe,$g);
            $id++;
        }
    }

    insertGroupe($connexion,$tabGroupe);
    fclose($handle);
}

function testPInListeG($Liste,$id)
{
  foreach ($Liste as $g)
  {
    if ($g->getNumGroupe() == $id)
    {
      return true;
    }
  }
  return false;
}

function getCSVforJury($connexion,$filename)
{
    $handle = fopen($filename,"r");
    $tabJury = array();
    $id = getMaxIDJURY($connexion)+1;
    while(($data = fgetcsv($handle, 1000, ",")) !== FALSE)
    {
        $Login = $data[0];
        $Mdp = $data[1];

        $g = new Jury($id,$Login,$Mdp);

        if (!testPInListeJ($tabJury,$g->getNumJury())) {
            array_push($tabJury,$g);
            $id++;
        }
    }

    insertJury($connexion,$tabJury);
    fclose($handle);
}

function testPInListeJ($Liste,$id)
{
  foreach ($Liste as $g)
  {
    if ($g->getNumJury() == $id)
    {
      return true;
    }
  }
  return false;
}
?>
