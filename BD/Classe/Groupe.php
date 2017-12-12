<?php
class Groupe{
    private $_NumGroupe;
    private $_Filiere;
    private $_NomProj;
    private $_Lycee;
    private $_ImageProjet;

    public function getNumGroupe(){
        return $_NumGroupe;
    }

    public function getFiliere(){
        return $_Filiere;
    }

    public function getNomProj(){
        return $_NomProj;
    }

    public function getLycee(){
        return $_Lycee;
    }

    public function getImageProjet(){
        return $_ImageProjet;
    }

    public function setFiliere($Filiere){
        $_Filiere = $Filiere;
    }

    public function setNomProj($NomProj){
        $_NomProj = $NomProj;
    }

    public function setLycee($Lycee){
        $_Lycee = $Lycee;
    }

    public function setImageProj($img){
        $_ImageProjet = $img;
    }

}


?>