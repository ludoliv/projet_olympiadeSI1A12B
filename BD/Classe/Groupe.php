<?php
class Groupe{
    private $_NumGroupe;
    private $_Filiere;
    private $_NomProj;
    private $_Lycee;
    private $_ImageProjet;

    public function __construct($groupe,$Filiere,$Proj,$Lycee,$img)
    {   
        $this->_NumGroupe = $groupe;
        $this->_Filiere = $Filiere;
        $this->_NomProj = $Proj;
        $this->_Lycee = $Lycee;
        $this->_ImageProjet = $img;
    }

    public function getNumGroupe(){
        return $this->_NumGroupe;
    }

    public function getFiliere(){
        return $this->_Filiere;
    }

    public function getNomProj(){
        return $this->_NomProj;
    }

    public function getLycee(){
        return $this->_Lycee;
    }

    public function getImageProjet(){
        return  $this->_ImageProjet;
    }

    public function setFiliere($Filiere){
        $this->_Filiere = $Filiere;
    }

    public function setNomProj($NomProj){
        $this->_NomProj = $NomProj;
    }

    public function setLycee($Lycee){
        $this->_Lycee = $Lycee;
    }

    public function setImageProj($img){
        $this->_ImageProjet = $img;
    }

}

$groupe = new Groupe(1,"STMG","Boum","LOL","../");
$groupe->setLycee("MDR");
echo $groupe->getLycee();

?>