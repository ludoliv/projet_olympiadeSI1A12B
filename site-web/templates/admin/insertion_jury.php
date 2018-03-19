<?php
    require '../../../BD/Interactions/Connexion.php';
    require '../../../BD/Interactions/InteractionsBD.php';

    try{
        $db = connect_database();

        $ID = getMaxIDJURY($db)+1;
        $login = $_POST["login"];
        $passwd = $_POST["passwd"];

        $stmt1 = $db->prepare("insert into JURY (NumJury,login_,password_)values (?,?,?);");

        $stmt1->bindParam(1,$ID);
        $stmt1->bindParam(2,$login);
        $stmt1->bindParam(3,$passwd);

        $stmt1->execute();
    }
    catch(Exception $e){
        echo $e->getMessage();
    }

    header('Location:insererJury.php');
?>
