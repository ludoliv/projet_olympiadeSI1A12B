<?php

    function getMaxIDPersonne($connexion)
    {
        // Writing the request
        $request = "Select max(ID) from Personne";

        // Getting the result after the query
        $result = $connexion->query($request);

        // Fetch the result in var $max
        $max = $result->fetch(PDO::FETCH_ASSOC);

        // Testing the value of $max
        if($max > 0){
            return $max;
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

            // Getting the max ID in the database
            $max = getMaxIDPersonne($connexion);

            // Binding
            $statement->bindParam(':id',$id);
            $statement->bindParam(':Nom',$Nom);
            $statement->bindParam(':Prenom',$Prenom);


            for($i = 0;$i < count($ListePersonne);$i++)
            {
                // Passing the value to the parameter
                $id = $max + i;
                $Nom = $ListePersonne[i].getNom();
                $Prenom = $ListePersonne[i].getPrenom();

                // Execute the insertion
                $statement.execute();
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
                $id = $ListeEleve[i].getID();
                $Filiere = $ListeEleve[i].getFiliere();
                $Num = $ListeEleve[i].getNumGroupe();

                // Execute the insertion
                $statement.execute();
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
                $id = $ListeProf[i].getID();
                $Num = $ListeProf[i].getNumJury();

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
                $Num = $ListeGroupe[i].getNumJury();
                $Nom = $ListeGroupe[i].getNomProj();
                $Lycee = $ListeGroupe[i].getLycee();
                $img = $ListeGroupe[i].getImageProjet();

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
                $Num = $ListeJury[i].getNumJury();
                $log = $ListeJury[i].getLogin();
                $pass = $ListeJury[i].getPassword();

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
            $prep = "SELECT * from PERSONNE where $idGroupe";

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
        catch(Exception $e)
        {
            echo e.getMessage();
        }
    }


?>
