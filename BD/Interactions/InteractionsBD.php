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
                $statement.execute();
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

            $statement = $connexion->prepare("INSERT INTO GROUPE (NumGroupe,NomProjet,Lycee,image_Projet) VALUES (:Num,:Nom,:Lycee,:img)");

            $statement->bindParam(':Num',$Num);
            $statement->bindParam(':Nom',$Nom);
            $statement->bindParam(':Nom',$Lycee);
            $statement->bindParam(':Nom',$img);

            for($i = 0;$i < count($ListeGroupe);$i++)
            {
                // Passing the value to the parameter
                $Num = $ListeGroupe[$i]->getNumJury();
                $Nom = $ListeGroupe[$i]->getNomProj();
                $Lycee = $ListeGroupe[$i]->getLycee();
                $img = $ListeGroupe[$i]->getImageProjet();

                // Execute the insertion
                $statement.execute();
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

            for($i = 0;$i < count($ListeGroupe);$i++)
            {
                // Passing the value to the parameter
                $Num = $ListeJury[$i]->getNumJury();
                $log = $ListeJury[$i]->getLogin();
                $pass = $ListeJury[$i]->getPassword();

                // Execute the insertion
                $statement.execute();
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
         * the groupe specified with the parameter $idGroupe
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
                echo $p.getNom();
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

            $Liste["Prototype"] = $Liste["Prototype"] / $NB;
            $Liste["Originalite"] = $Liste["Originalite"]/$NB;
            $Liste["DemarcheSI"] = $Liste["DemarcheSI"]/$NB;
            $Liste["pluriDisciplinarite"] = $Liste["pluriDisciplinarite"]/$NB;
            $Liste["Maitrise"] = $Liste["Maitrise"]/$NB;
            $Liste["devDurable"] = $Liste["devDurable"]/$NB;

            return $Liste;
        }
        catch(PDOException $e)
        {
        echo $e.getMessage();
        }
    }

?>
