

<?php

class Animal{



    public static function getAllAnimal()
    {
        $conn = Database::connectDatabase();
        $stmt = $conn->prepare("SELECT animal.id_animal, animal.name, animal.age, animal.gender, animal.weight, animal.tatoo, animal.chip, color.color AS 'couleur', race.name AS 'race', species.name AS 'espece'
        FROM animal
        JOIN color ON animal.id_color = color.id_color
        JOIN race ON animal.id_race = race.id_race
        JOIN species ON animal.id_species = species.id_species;");
        $stmt->execute();
      
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result =  $stmt->fetchAll();
        $conn = null;
        return $result;
        
    }
    public static function getAnimal($id)
    {
        $conn = Database::connectDatabase();
        $stmt = $conn->prepare("SELECT animal.id_animal, animal.name, animal.age, animal.gender, animal.weight, animal.tatoo, animal.chip, color.color AS 'couleur', race.name AS 'race', species.name AS 'espece'
        FROM animal
        JOIN color ON animal.id_color = color.id_color
        JOIN race ON animal.id_race = race.id_race
        JOIN species ON animal.id_species = species.id_species
        WHERE animal.id_animal = :id ;");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
      
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result =  $stmt->fetchAll();
        $conn = null;
        return $result;

    }


    public static function deleteAnimal($id)
    {

        $conn = Database::connectDatabase();
        $stmt = $conn->prepare('DELETE FROM animal WHERE id_animal=:del');
        $stmt->bindParam(':del', $id);
        // use exec() because no results are returned
        $stmt->execute();

      $conn = null;

    }

    public static function updateAnimal($id,$pet_name,$pet_age,$pet_gender,$pet_weight,$pet_tattooed,$pet_chiped,$pet_color,$pet_race,$pet_specie)
    {
        
        $conn = Database::connectDatabase();

        //Prepare et bind les parametre
        $stmt = $conn->prepare("UPDATE `animal` SET
         `name`= :name,`age`= :age,`gender`= :gender,`weight`= :weight ,`tatoo`= :tatoo
         ,`chip`= :chip ,`id_color`= :id_color ,`id_race`= :id_race,`id_species`= :id_species
          WHERE animal.id_animal = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $pet_name);
        $stmt->bindParam(':age', $pet_age);
        $stmt->bindParam(':gender', $pet_gender);
        $stmt->bindParam(':weight', $pet_weight);
        $stmt->bindParam(':tatoo', $pet_tattooed);
        $stmt->bindParam(':chip', $pet_chiped);
        $stmt->bindParam(':id_color', $pet_color);
        $stmt->bindParam(':id_race', $pet_race);
        $stmt->bindParam(':id_species', $pet_specie);
        
        if($pet_chiped == "on")
        {
            $pet_chiped = 1;
        }
        if($pet_tattooed == "on")
        {
            $pet_tattooed = 1;
        }
        // Envoie la requete

        $stmt->execute();
        $conn = null;
    }





    

    public static function addAnimal($pet_name,$pet_age,$pet_gender,$pet_weight,$pet_tattooed,$pet_chiped,$pet_color,$pet_race,$pet_specie)
    {

        $conn = Database::connectDatabase();

        //Prepare et bind les parametre
        $stmt = $conn->prepare("INSERT INTO `animal`( `name`, `age`, `gender`, `weight`, `tatoo`, `chip`, `id_color`, `id_race`, `id_species`)
        VALUES (:name,:age,:gender,:weight,:tatoo,:chip,:id_color,:id_race,:id_species)");
        $stmt->bindParam(':name', $pet_name);
        $stmt->bindParam(':age', $pet_age);
        $stmt->bindParam(':gender', $pet_gender);
        $stmt->bindParam(':weight', $pet_weight);
        $stmt->bindParam(':tatoo', $pet_tattooed);
        $stmt->bindParam(':chip', $pet_chiped);
        $stmt->bindParam(':id_color', $pet_color);
        $stmt->bindParam(':id_race', $pet_race);
        $stmt->bindParam(':id_species', $pet_specie);
        
        if($pet_chiped == "on")
        {
            $pet_chiped = 1;
        }
        if($pet_tattooed == "on")
        {
            $pet_tattooed = 1;
        }
        // Envoie la requete

        $stmt->execute();
        $conn = null;
    }


}



?>