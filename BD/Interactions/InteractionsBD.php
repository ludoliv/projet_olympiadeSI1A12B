<?php
    function getMaxIDPersonne($connexion)
    {
        // Writing the request
        $request = "SELECT max(ID) from PERSONNE";

        // Getting the result after the query
        $result = $connexion->query($request);

        // Fetch the result in var $max
        $max = $result->fetch();

        // Testing the value of $max
        if($max['max(ID)'] > 0){
            return $max['max(ID)'];
        }
        else{
            return 0;
        }
    }

    function getMaxIDGROUPE($connexion)
    {
        // Writing the request
        $request = "SELECT max(NumGroupe) from GROUPE";

        // Getting the result after the query
        $result = $connexion->query($request);

        // Fetch the result in var $max
        $max = $result->fetch();

        // Testing the value of $max
        if($max['max(NumGroupe)'] > 0){
            return $max['max(NumGroupe)'];
        }
        else{
            return 0;
        }
    }

    function getMaxIDJURY($connexion)
    {
        // Writing the request
        $request = "SELECT max(NumJury) from JURY";

        // Getting the result after the query
        $result = $connexion->query($request);

        // Fetch the result in var $max
        $max = $result->fetch();

        // Testing the value of $max
        if($max['max(NumJury)'] > 0){
            return $max['max(NumJury)'];
        }
        else{
            return 0;
        }
    }

    function getMaxIDHeure($connexion)
    {
        // Writing the request
        $request = "SELECT max(IDHeure) as max from HEURE";

        // Getting the result after the query
        $result = $connexion->query($request);

        // Fetch the result in var $max
        $max = $result->fetch();

        // Testing the value of $max
        if($max['max'] > 0){
            return $max['max'];
        }
        else{
            return 0;
        }
    }

    function getMaxIDNote($connexion)
    {
        // Writing the request
        $request = "SELECT max(idNote) as max from NOTE";

        // Getting the result after the query
        $result = $connexion->query($request);

        // Fetch the result in var $max
        $max = $result->fetch();

        // Testing the value of $max
        if($max['max'] > 0){
            return $max['max'];
        }
        else{
            return 0;
        }
    }


    function insertPersonne($connexion,$ListePersonne)
    {
        try{
            // Creation of the statement
            $statement = $connexion->prepare("INSERT INTO PERSONNE (ID,Nom,Prenom) VALUES (:id,:Nom, :Prenom)");


            // Binding
            $statement->bindParam(':id',$id);
            $statement->bindParam(':Nom',$Nom);
            $statement->bindParam(':Prenom',$Prenom);


            for($i = 0;$i < count($ListePersonne);$i++)
            {
                // Passing the value to the parameter
                $p = $ListePersonne[$i];
                $id = $p->getiD();
                $Nom = $p->getNom();
                $Prenom = $p->getPrenom();

                // Execute the insertion
                $statement->execute();
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    function insertEleve($connexion,$ListeEleve)
    {
        try{

            $statement = $connexion->prepare("INSERT INTO ELEVE (IDEleve,Filiere,NumGroupe) VALUES (:id,:filiere, :Num)");

            $statement->bindParam(':id',$id);
            $statement->bindParam(':filiere',$Filiere);
            $statement->bindParam(':Num',$Num);

            for($i = 0;$i < count($ListeEleve);$i++)
            {
                // Passing the value to the parameter
                $id = $ListeEleve[$i]->getID();
                $Filiere = $ListeEleve[$i]->getFiliere();
                $Num = $ListeEleve[$i]->getNumGroupe();

                // Execute the insertion
                $statement->execute();
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    function insertProf($connexion,$ListeProf)
    {
        try{

            $statement = $connexion->prepare("INSERT INTO PROFESSEUR (IDProf,NumJury) VALUES (:id,:Num)");

            $statement->bindParam(':id',$id);
            $statement->bindParam(':Num',$Num);

            for($i = 0;$i < count($ListeProf);$i++)
            {
                // Passing the value to the parameter
                $id = $ListeProf[$i]->getID();
                $Num = $ListeProf[$i]->getNumJury();

                // Execute the insertion
                $statement->execute();
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    function insertGroupe($connexion,$ListeGroupe)
    {
        /**
         * This function is inserting the groups 
         * in the database
         * 
         * @author Quentin Bouny
         * 
         * @param PDO $connexion link with the Database
         * @param array $ListeGroupe list of the groups that need to be inserted
         */
        try{

            $statement = $connexion->prepare("INSERT INTO GROUPE (NumGroupe,NomProjet,Lycee,numSalle,image_Projet) VALUES (:Num,:Nom,:Lycee,:salle,:img)");

            $statement->bindParam(':Num',$Num);
            $statement->bindParam(':Nom',$Nom);
            $statement->bindParam(':Lycee',$Lycee);
            $statement->bindParam(':img',$img);
            $statement->bindParam(':salle',$salle);

            for($i = 0;$i < count($ListeGroupe);$i++)
            {
                // Passing the value to the parameter
                $Num = $ListeGroupe[$i]->getNumGroupe();
                $Nom = $ListeGroupe[$i]->getNomProj();
                $Lycee = $ListeGroupe[$i]->getLycee();
                $salle = $ListeGroupe[$i]->getSalle();
                $img = $ListeGroupe[$i]->getImageProjet();

                // Execute the insertion
                $statement->execute();
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    function insertJury($connexion,$ListeJury)
    {
        /**
         * This function is inserting the jury 
         * in the database
         * 
         * @author Quentin Bouny
         * 
         * @param PDO $connexion link with the Database
         * @param array $ListeJury list of the jury that need to be inserted
         */
        try{

            $statement = $connexion->prepare("INSERT INTO JURY (NumJury,login_,password_) VALUES (:Num,:log,:passwd)");

            $statement->bindParam(':Num',$Num);
            $statement->bindParam(':log',$log);
            $statement->bindParam(':passwd',$pass);

            for($i = 0;$i < count($ListeJury);$i++)
            {
                // Passing the value to the parameter
                $Num = $ListeJury[$i]->getNumJury();
                $log = $ListeJury[$i]->getLogin();
                $pass = $ListeJury[$i]->getPassword();

                // Execute the insertion
                $statement->execute();
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    function insertHeure($connexion,$ListeHeure)
    {
        /**
         * This function is inserting the Heure 
         * in the database
         * 
         * @author Quentin Bouny
         * 
         * @param PDO $connexion link with the Database
         * @param array $ListeHeure list of the Heure that need to be inserted
         */
        try{

            $statement = $connexion->prepare("INSERT INTO HEURE (idHeure,hDeb,hFin) VALUES (:id,:hDeb,:hFin)");

            $statement->bindParam(':id',$id);
            $statement->bindParam(':hDeb',$hdeb);
            $statement->bindParam(':hFin',$hfin);

            for($i = 0;$i < count($ListeHeure);$i++)
            {
                // Passing the value to the parameter
                $id = $ListeHeure[$i]->getID();
                $hdeb = $ListeHeure[$i]->getDeb();
                $hfin = $ListeHeure[$i]->getFin();

                // Execute the insertion
                $statement->execute();
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    function insertJuge($connexion,$ListeJuge)
    {
        /**
         * This function is inserting the Juge values 
         * in the database
         * 
         * @author Quentin Bouny
         * 
         * @param PDO $connexion link with the Database
         * @param array $ListeHeure list of the Heure that need to be inserted
         */
        try{

            $statement = $connexion->prepare("INSERT INTO JUGE (NumJury,NumGroupe,idHeure,numSalle) VALUES (:NumJury,:NumGroupe,:id,:NumSalle)");

            $statement->bindParam(':NumJury',$NumJury);
            $statement->bindParam(':NumGroupe',$NumGroupe);
            $statement->bindParam(':id',$id);
            $statement->bindParam(':NumSalle',$Salle);

            for($i = 0;$i < count($ListeJuge);$i++)
            {
                // Passing the value to the parameter
                $NumJury = $ListeJuge[$i]->get_NumJury();
                $NumGroupe = $ListeJuge[$i]->get_NumGroupe();
                $id = $ListeJuge[$i]->get_idHeure();
                $Salle = $ListeJuge[$i]->getSalle();

                // Execute the insertion
                $statement->execute();
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }

    function insertNote($connexion,$ListeNote)
    {
        /**
         * This function is inserting the Juge values 
         * in the database
         * 
         * @author Quentin Bouny
         * 
         * @param PDO $connexion link with the Database
         * @param array $ListeHeure list of the Heure that need to be inserted
         */
        try{
            
            $statement = $connexion->prepare("INSERT INTO NOTE (idNote,prototype,originalite,demarcheSI,pluriDisciplinarite,maitrise,devDurable) VALUES (:id,:proto,:ori,:demarche,:pluri,:maitrise,:DD)");

            $statement->bindParam(':id',$id);
            $statement->bindParam(':proto',$proto);
            $statement->bindParam(':ori',$ori);
            $statement->bindParam(':demarche',$demarche);
            $statement->bindParam(':pluri',$pluri);
            $statement->bindParam(':maitrise',$maitrise);
            $statement->bindParam(':DD',$DD);

            for($i = 0;$i < count($ListeJuge);$i++)
            {
                // Passing the value to the parameter
                $id = $ListeNote[$i]->getID();
                $proto = $ListeNote[$i]->getProto();
                $ori = $ListeNote[$i]->getOrigin();
                $pluri = $ListeNote[$i]->getPluriDiscipline();
                $maitrise = $ListeNote[$i]->getMaitrise();
                $DD = $ListeNote[$i]->getDurable();

                // Execute the insertion
                $statement->execute();
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }  
    }

    function insertDonne($connexion,$ListeDonne)
    {
        /**
         * This function is inserting the Juge values 
         * in the database
         * 
         * @author Quentin Bouny
         * 
         * @param PDO $connexion link with the Database
         * @param array $ListeHeure list of the Heure that need to be inserted
         */
        try{

            $statement = $connexion->prepare("INSERT INTO DONNE (NumJury,NumGroupe,idNote) VALUES (:NumJury,:NumGroupe,:id)");

            $statement->bindParam(':NumJury',$NumJury);
            $statement->bindParam(':NumGroupe',$NumGroupe);
            $statement->bindParam(':id',$id);

            for($i = 0;$i < count($ListeJuge);$i++)
            {
                // Passing the value to the parameter
                $NumJury = $ListeJuge[$i]->get_NumJury();
                $NumGroupe = $ListeJuge[$i]->get_NumGroupe();
                $id = $ListeJuge[$i]->get_IdNote();

                // Execute the insertion
                $statement->execute();
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
    }



    function getPersonneFromGroupe($connexion,$idGroupe)
    {
        /**
         * This function is getting the Personne that are in
         * the groupe specified with the parameter $idGroupe
         * 
         * @author Quentin Bouny
         * 
         * @param PDO $connexion link with the Database
         * @param int $idGroupe id of the groupe we're searching members
         */
        try{
            $prep = "SELECT ID, Nom, Prenom from PERSONNE NATURAL JOIN ELEVE where IDEleve = ID and NumGroupe=$idGroupe;";

            $reponse = $connexion->query($prep);
            $ListePersonne = array();

            while ($donnees = $reponse->fetch())
            {
                $id = $donnees[0];
                $Nom = $donnees[1];
                $Prenom = $donnees[2];

                $p = new Personne($id,$Nom,$Prenom);
                echo $p;
                array_push($ListePersonne,$p);
            }

            return $ListePersonne;
        }
        catch(Exception $e)
        {
            echo e.getMessage();
        }
    }

    function getEleve($connexion)
    {
        /**
         * This function is getting the Personne that are in
         * the ELEVE table
         * 
         * @author Quentin Bouny
         * 
         * @param PDO $connexion link with the Database
         */
        try{
            $prep = "SELECT * from PERSONNE where ID=(SELECT IDEleve from ELEVE where IDEleve=ID);";

            $reponse = $connexion->query($prep);
            $ListePersonne = array();

            while ($donnees = $reponse->fetch())
            {
                $id = $donnees[0];
                $Nom = $donnees[1];
                $Prenom = $donnees[2];

                $p = new Personne($id,$Nom,$Prenom);
                array_push($ListePersonne,$p);
            }
            return $ListePersonne;
        }
        catch(PDOException $e)
        {
            echo $e.getMessage();
        }
    }

    function getNote($connexion,$numGroupe)
    {
        /**
         * @author Quentin Bouny
         * 
         * @param PDO:$connexion link with the Database
         * @param int:$numGroupe number of the group we want to get the notes
         */
        try
        {
            $Liste = array("Prototype"=>0,"Originalite"=> 0,"DemarcheSI"=>0,"pluriDisciplinarite"=>0,"Maitrise"=>0,"devDurable"=>0);

            $prep = "select idNote from DONNE where NumGroupe = $numGroupe";
            $reponse = $connexion->query($prep);

            while ($donnees = $reponse->fetch())
            {
                $id = $donnees['idNote'];
                $req = "select * from NOTE where idNote = $id";
                
                $data = $connexion->query($req);
                $rep = $data->fetch();
                
                $Liste["Prototype"] += $rep['prototype'];
                $Liste["Originalite"] += $rep['originalite'];
                $Liste["DemarcheSI"] += $rep['demarcheSI'];
                $Liste["pluriDisciplinarite"] += $rep['pluriDisciplinarite'];
                $Liste["Maitrise"] += $rep['maitrise'];
                $Liste["devDurable"] += $rep['devDurable'];
            }
            $NB = $reponse->rowCount();

            if ($NB == 0)
            {
                return array("Prototype"=>0,"Originalite"=> 0,"DemarcheSI"=>0,"pluriDisciplinarite"=>0,"Maitrise"=>0,"devDurable"=>0);
            }
            else
            {
                $Liste["Prototype"] = $Liste["Prototype"] / $NB;
                $Liste["Originalite"] = $Liste["Originalite"]/$NB;
                $Liste["DemarcheSI"] = $Liste["DemarcheSI"]/$NB;
                $Liste["pluriDisciplinarite"] = $Liste["pluriDisciplinarite"]/$NB;
                $Liste["Maitrise"] = $Liste["Maitrise"]/$NB;
                $Liste["devDurable"] = $Liste["devDurable"]/$NB;

            }

            return $Liste;
        }
        catch(PDOException $e)
        {
        echo $e.getMessage();
        }
    }

    function checkLogin($connexion,$Login,$password)
    {
        /**
         * @author Quentin Bouny
         * 
         * @param PDO $connexion Link to the database
         * @param String $Login the login that need to be checked
         * @param String $password the password that need to be checked
         * 
         */
        try
        {
            $prep = "SELECT login_, password_ FROM JURY";
            $prep1 = "SELECT login, MotDePasse FROM ADMINISTRATEUR";

            $rep = $connexion->query($prep1);

            $test = $rep->fetch();
            if ( ($test['login'] == $Login) && ($test['MotDePasse'] == $password) ) 
            {
                return 'Admin';
            }

            $rep = $connexion->query($prep);

            while ($test = $rep->fetch())
            {
                if ( ($test['login_'] == $Login) && ($test['password_'] == $password) )
                {
                    return 'Jury';
                }
            }

            return 'None';
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    function getProf($connexion)
    {
        /**
         * This function is getting the Personne that are in
         * the PROFESSEUR table
         * 
         * @author Quentin Bouny
         * 
         * @param PDO $connexion link with the Database
         */
        try{
            $prep = "SELECT * from PERSONNE where ID=(SELECT IDProf from PROFESSEUR where IDProf=ID);";

            $reponse = $connexion->query($prep);
            $ListePersonne = array();

            while ($donnees = $reponse->fetch())
            {
                $id = $donnees[0];
                $Nom = $donnees[1];
                $Prenom = $donnees[2];

                $p = new Personne($id,$Nom,$Prenom);
                array_push($ListePersonne,$p);
            }
            return $ListePersonne;
        }
        catch(PDOException $e)
        {
            echo $e.getMessage();
        }
    }

    function getHeure($connexion)
    {
       /**
         * This function is getting the heure that are in
         * the HEURE table
         * 
         * @author Quentin Bouny
         * 
         * @param PDO $connexion link with the Database
         */
        try{
            $prep = "SELECT * from HEURE;";

            $reponse = $connexion->query($prep);
            $ListeHeure = array();

            while ($donnees = $reponse->fetch())
            {
                $id = $donnees[0];
                $HDeb = $donnees[1];
                $HFin = $donnees[2];

                $p = new Heure($id,$HDeb,$HFin);
                array_push($ListeHeure,$p);
            }
            return $ListeHeure;
        }
        catch(PDOException $e)
        {
            echo $e.getMessage();
        } 
    }

    function getGroupe($connexion)
    {
       /**
         * This function is getting the groups that are in
         * the GROUPE table
         * 
         * @author Quentin Bouny
         * 
         * @param PDO $connexion link with the Database
         */
        try{
            $prep = "SELECT * from GROUPE where NumGroupe > 0;";

            $reponse = $connexion->query($prep);
            $ListeGroupe = array();

            while ($donnees = $reponse->fetch())
            {
                $id = $donnees[0];
                $Nom = $donnees[1];
                $Lycee = $donnees[2];
                $img = $donnees[3];

                $p = new Groupe($id,$Nom,$Lycee,$img);
                array_push($ListeGroupe,$p);
            }
            return $ListeGroupe;
        }
        catch(PDOException $e)
        {
            echo $e.getMessage();
        } 
    }

    function getJury($connexion)
    {
       /**
         * This function is getting the jurys that are in
         * the JURY table
         * 
         * @author Quentin Bouny
         * 
         * @param PDO $connexion link with the Database
         */
        try{
            $prep = "SELECT * from JURY;";

            $reponse = $connexion->query($prep);
            $ListeJury = array();

            while ($donnees = $reponse->fetch())
            {
                $id = $donnees[0];
                $Log = $donnees[1];
                $Pass = $donnees[2];

                $p = new Jury($id,$Log,$Pass);
                array_push($ListeJury,$p);
            }
            return $ListeJury;
        }
        catch(PDOException $e)
        {
            echo $e.getMessage();
        } 
    }

?>
