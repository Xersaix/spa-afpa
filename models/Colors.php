<?php

class Colors {

private int $col_id;
private string $col_name;

public static function getAllColors()
{

    $conn = Database::connectDatabase();

    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT * FROM `color`;");
    $stmt->execute();
  
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetchAll();
    $conn = null;
    return $result;

}

}

?>