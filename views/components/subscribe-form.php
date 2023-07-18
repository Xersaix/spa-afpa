<?php

$regexUsername = '/^[a-zA-Z]+$/';
$regexPass = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';
$username =  "";
$mail =  "";
$password = "";
$errors = [];


if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["username"]))
    {

        $username = htmlspecialchars($_POST["username"]);
        if (empty($username)) {
            $errors['username'] = 'Champs obligatoire';

        } else if (!preg_match($regexUsername, $username)) {
            $errors['username'] = 'Mauvais format';
        }

    }


    if(isset($_POST["mail"]))
    {
        $mail = htmlspecialchars($_POST["mail"]);

        if (empty($mail)) {
            $errors['mail'] = 'Champs obligatoire';

        } else if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $errors['mail'] = 'Mauvais format';
        }
    }

    if(isset($_POST["password"]))
    {

        $password = htmlspecialchars($_POST["password"]);
        if (empty($password)) {
            $errors['password'] = 'Champs obligatoire';

        } else if (!preg_match($regexPass, $password)) {
            $errors['password'] = 'Le mot de passe doit avoir minimum 8 charactère, au moins 1 lettre et 1 chiffre';
        }
    }




    if(count($errors) == 0)
    {
        $password = password_hash($password,PASSWORD_DEFAULT);
        User::addUser($username,$mail,$password);
      
        echo "<script> location.href='controller-home.php'; </script>";
        exit;


    }else{

        var_dump($errors);
    }

}

?>


<div class="w-full  min-h-screen text-center flex justify-center items-center">
  <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="" method="POST" >
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
        Nom d'utilisateur
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="username" id="username" type="text" placeholder="Nom d'utilisateur">
      <p class="text-red-500 text-xs italic"><?= $errors["username"] ?? '' ?></p>
    </div>
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="mail">
        Adresse email
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="mail" id="mail" type="email" placeholder="Adresse email">
      <p class="text-red-500 text-xs italic"><?= $errors["mail"] ?? '' ?></p>
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
        Mot de passe
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password" id="password" type="password" placeholder="******************">
      <p class="text-red-500 text-xs italic"><?= $errors["password"] ?? '' ?></p>
    </div>
    <div class="flex items-center justify-center">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
       S'inscrire
      </button>

    </div>
  </form>

</div>