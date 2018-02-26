<?php
class Personne{
    private $_ID;
    private $_Nom;
    private $_Prenom;

    public function __construct($id,$nom,$prenom)
    {
        $this->_ID = $id;
        $this->_Nom = $nom;
        $this->_Prenom = $prenom;
    }

    public function getiD(){
        return $this->_ID;
    }

    public function getNom(){
        return $this->_Nom;
    }

    public function getPrenom(){
        return $this->_Prenom;
    }

    public function setNom($New_nom){
        $_Nom = $New_nom;
    }

    public function setPrenom($New_prenom){
        $_Prenom = $New_prenom;
    }

    public function __toString()
    {
        return $this->_Prenom;
    }
}

?>
