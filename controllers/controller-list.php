<?php 

require "../config.php";
if (!isset($_SESSION["username"]))
{


        header('Location: controller-connect.php');
        exit;

}
require "../helpers/Database.php";
require "../models/Animal.php";


include "../views/liste.php";



?>