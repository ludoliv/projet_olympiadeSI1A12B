<?php 
class Personne{
    private $_ID;
    private $_Nom;
    private $_Prenom;

    public function getID(){
        return $_ID;
    }

    public function getNom(){
        return $_Nom;
    }

    public function getPrenom(){
        return $_Prenom;
    }

    public function setNom($New_nom){
        $_Nom = $New_nom;
    }

    public function setPrenom($New_prenom){
        $_Prenom = $New_prenom;
    }
}

?>