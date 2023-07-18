<?php 

require "../config.php";
if (!isset($_SESSION["username"]))
{


        header('Location: controller-connect.php');
        exit;

}
require "../helpers/Database.php";
require "../models/Colors.php";
require "../models/Species.php";
require "../models/Race.php";
require "../models/Animal.php";

include "../views/update-form.php";



?>