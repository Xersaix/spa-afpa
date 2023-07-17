<?php

class Species {

   public int $id_species;
   public string $name;


   public static function getAllSpecies()
   {


    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT * FROM `species`;");
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetchAll();
    $conn = null;
    return $result;


   }



}


?>