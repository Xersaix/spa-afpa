<?php 

require "../config.php";

if (!isset($_SESSION["username"]))
{


        header('Location: controller-home.php');
        exit;

}else {

    
}
include "../views/admin.php";



?>