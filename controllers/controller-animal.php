<?php 

require "../config.php";
if (!isset($_SESSION["username"]))
{


        header('Location: controller-home.php');
        exit;

}
require "../helpers/Database.php";
require "../models/Animal.php";

include "../views/animal.php";



?>