<?php

    function getMaxIDPersonne($connexion)
    {
        // Writing the request 
        $request = "Select max(ID) from ELEVE";

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

    function insertPersonne($connexion,$ListeEleve)
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
    
    
            for($i = 0;$i < count($ListeEleve);$i++)
            {
                // Passing the value to the parameter
                $id = $max + i;
                $Nom = $ListeEleve[i].getNom();
                $Prenom = $ListeEleve[i].getPrenom();

                // Execute the insertion
                $statement.execute();
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }



?>