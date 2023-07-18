<?php

class User {

public static function addUser($username,$mail,$pass)
{

    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("INSERT INTO `refuge_user`( `username`, `user_password`, `user_mail`) VALUES (:username,:pass,:mail)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':mail', $mail);
    $stmt->bindParam(':pass', $pass);


    $stmt->execute();

    $conn = null;

}


public static function verifyUserCo($username,$pass){

    $conn = Database::connectDatabase();
    $stmt = $conn->prepare("SELECT * FROM `refuge_user` WHERE username = :username ");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result =  $stmt->fetch();
    $conn = null; 
    if(password_verify($pass,$result["user_password"]))
    {

        return true;
    }
    else{

        return false;
    }



    
}

public static function getUser($username){

        $conn = Database::connectDatabase();
        $stmt = $conn->prepare("SELECT * FROM `refuge_user` WHERE username = :username ");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        // set the resulting array to associative
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result =  $stmt->fetch();
        $conn = null;
        return $result;
    }




}


?>