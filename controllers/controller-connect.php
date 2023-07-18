<?php 

require "../config.php";
require "../helpers/Database.php";
require "../models/User.php";
$regexUsername = '/^[a-zA-Z]+$/';
$regexPass = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';
$username =  "";
$result = NULL;
$password = "";
$errors = [];


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["username"]))
    {

        $username = htmlspecialchars($_POST["username"]);
        if (empty($username)) {
            $errors['username'] = 'Champs obligatoire';

        }

    }




    if(isset($_POST["password"]))
    {

        $password = htmlspecialchars($_POST["password"]);
        if (empty($password)) {
            $errors['password'] = 'Champs obligatoire';

        }
    }


    if(isset($_POST["password"]) && isset($_POST["username"]))
    {
        $result = User::verifyUserCo($username,$password);
        if ($result)
        {
            echo "nickel";
        }else{
            $errors["password"] = "Mot de passe ou nom d'utilisateur incorrect";
        }


    }


    if(count($errors) == 0)
    {

        $user = User::getUser($username);
        session_start();
        $_SESSION["username"] = $user["username"];
        $_SESSION["mail"] = $user["user_mail"];

        if(isset($_SESSION["username"]) && isset($_SESSION["mail"]) )
        {
            header('Location: controller-home.php');
            exit;
        }

      



    }else{

        var_dump($errors);
    }

}


include "../views/connect.php";



?>