<?php
class Jury{
    private $_NumJury;
    private $_Login;
    private $_Password;

    public function getNumJury(){
        return $_NumJury;
    }

    public function getLogin(){
        return $_Login;
    }

    public function getPassword(){
        return $_Password;
    }

    public function setPassword($Password){
        $_Password = $Password;
    }

    public function setLogin($Login){
        $_Login = $Login;
    }
}


?>