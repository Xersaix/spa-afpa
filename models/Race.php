<?php

class Race {

   public int $id_species;
   public string $name;
   public int $id_race;


   public static function getAllRace()
   {
    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT * FROM `race`;");
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetchAll();
    $conn = null;
    return $result;
   }

   public static function getRace($id)
   {

    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT * FROM `race`
    WHERE race.id_race = :id ;;");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetch();
    $conn = null;
    return $result;

   }

}


?>