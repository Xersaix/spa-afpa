<?php 

require "../config.php";

require "../helpers/Database.php";
require "../models/Animal.php";





$result = Animal::getAllAnimal();




include "../views/home.php";



?>