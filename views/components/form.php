<?php
$pet_name = "";
$pet_age = 0;
$pet_gender = "Male";
$pet_weight = 0;
$pet_tattooed = 0;
$pet_chiped = 0;
$pet_color = "";
$pet_specie = "";
$pet_race = "";

$errors = [];
$regexName = '/^[a-zA-Z]+$/';

$show1 = false;
$show2 = false;

// Get all the color and initailize the color checker. 
$color = Colors::getAllColors();
$color_checker = array();

foreach ($color as $row) {
    array_push($color_checker,$row["id_color"]);

}

// Get all the color and initailize the color checker. 
$species = Species::getAllSpecies();
$species_checker = array();

// Get all the species and initailize the species checker.
foreach ($species as $row) {
    array_push($species_checker,$row["id_species"]);

}

$race = Race::getAllRace();
$race_checker = array();
// Get all the race and initailize the race checker.
foreach ($race as $row) {
    array_push($race_checker,$row["id_race"]);

}
/* !in_array($pet_color, array(1,2) in_array() Permet de verifie si le contenue de la variable est égale a l'une des valeur contenue dans l'array du deuxieme parametre */

if($_SERVER["REQUEST_METHOD"] == "POST")
{ 
    // verification du nom
    if(isset($_POST["pet-name"]))
    {
    $pet_name = $_POST["pet-name"];   
            if (empty($pet_name)) {
                $errors['pet-name'] = 'Champs obligatoire';

            } else if (!preg_match($regexName, $pet_name)) {
                $errors['pet-name'] = 'Mauvais format';
            }

    }

    // verification de l'age
    if(isset($_POST["pet-age"]))
    {
    $pet_age = intval($_POST["pet-age"]);   
            if (empty($pet_age)) {
                $errors['pet-age'] = 'Champs obligatoire';

            } else if (!is_int($pet_age)) {
                $errors['pet-age'] = 'Mauvais format';
            }

    }
    // verification du poids
    if(isset($_POST["pet-weight"]))
    {
    $pet_weight = floatval($_POST["pet-weight"]);   
            if (empty($pet_weight)) {
                $errors['pet-weight'] = 'Champs obligatoire';

            } else if (!is_float($pet_weight)) {
                $errors['pet-weight'] = 'Mauvais format';
            }

    }

        // verification du genre
        if(isset($_POST["pet-gender"]))
        {
        $pet_gender = $_POST["pet-gender"];   
                if (empty($pet_gender)) {
                    $errors['pet-weight'] = 'Champs obligatoire';
    
                } else if (!in_array($pet_gender, array("Male","Female"))) {
                    $errors['pet-gender'] = 'Mauvais format';
                }
    
        }
    
  
    // Verifie la couleur
    if(isset($_POST["pet-color"]))
    {
       
           $pet_color = $_POST["pet-color"];
           if (empty($pet_color)) {
            $errors['pet-color'] = 'Champs obligatoire';

        } else if (!in_array($pet_color, $color_checker)) {
            $errors['pet-color'] = 'Petit Malin ';
        }

    }else{
        $errors['pet-color'] = 'Champs obligatoire';
    }
    // Verifie l'espece
    if(isset($_POST["pet-specie"]))
    {
       
           $pet_specie = $_POST["pet-specie"];
           if (empty($pet_specie)) {
            $errors['pet-specie'] = 'Champs obligatoire';

        } else if (!in_array($pet_specie, $species_checker)) {
            $errors['pet-specie'] = 'Petit Malin ';
        }

    }else{
        $errors['pet-specie'] = 'Champs obligatoire';
    }


    // Verifie la race
    if(isset($_POST["pet-race"]) && isset($_POST["pet-specie"]))
    {
       
           $pet_race = $_POST["pet-race"];
           $animal_race = Race::getRace($pet_race);
           if (empty($pet_race)) {
            $errors['pet-race'] = 'Champs obligatoire';
            

        } else if (!in_array($pet_race, $race_checker)) {
            $errors['pet-race'] = "Petit Malin ";
        } else if ( $pet_specie != $animal_race["id_species"]) {
            $errors['pet-race'] = "L'espece ne correspond pas a la race ";
        }

    }else{
        $errors['pet-race'] = 'Champs obligatoire';
    }

    // verifie le tattouage
    if(isset($_POST["pet-tattooed"]))
    {
        $pet_tattooed = $_POST["pet-tattooed"];
        
    if (!in_array($pet_tattooed, array(0, "on"))) {
        $errors['pet-tattooed'] = 'Bien essayer';
    }
    }

    // verifie le puçage
    if(isset($_POST["pet-chiped"]))
    {
        $pet_chiped = $_POST["pet-chiped"];
        
    if (!in_array($pet_chiped, array(0, "on"))) {
        $errors['pet-chiped'] = 'Bien essayer';
    }
    }

    if(count($errors) == 0)
    {
        Animal::addAnimal($pet_name,$pet_age,$pet_gender,$pet_weight,$pet_tattooed,$pet_chiped,$pet_color,$pet_race,$pet_specie);
        $show1 = true;
    }else{

        $show2 = true;
    }
}

    $color = Colors::getAllColors();
?>
<!-- Succes Toast  -->
<?php if($show1 == true) { ?>

<div id="alert-border-3" class="flex fixed items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
<svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
</svg>
<div class="ml-3 text-sm font-medium">
 Modification réussi !
</div>
<button aria-label="Close"  id= "close-succes" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700">
  <span class="sr-only">Dismiss</span>
  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
  </svg>
</button>
</div>
<?php } ?>


<!-- Failure Toast -->
<?php if($show2 == true) { ?>
<div  id="alert-border-3" class="flex w-full overflow-hidden ov items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800" role="alert">

<div class=" text-xs font-medium sm:text-xs">
<p>Echec de la modification <br></p>
<p><?= var_dump($errors) ?></p>
</div>
<button aria-label="Close"  id= "close-succes" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700">
  <span class="sr-only">Dismiss</span>
  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
  </svg>
</button>
</div>
<?php } ?>

<div class="w-full">
<!-- Boutton précédant -->
<a href="controller-admin.php" class="align-self-start">
<button type="button" class="text-white bg-gray-700 m-5 hover:bg-blue-800  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-gray-700 dark:hover:bg-gray-700dark:focus:ring-blue-800"style="transform:rotate(0.5turn)">
  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
  </svg>
  <span class="sr-only">Icon description</span>
</button>
</a>
</div>

<div class="w-full max-w-xs">
    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="" method="POST">
        <!-- Nom -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="pet-name">
                Nom <span class="text-red-600"> <?= $errors['pet-name'] ?? '' ?></span>
            </label>
            <input type="text"
            value="<?= htmlspecialchars($_POST['pet-name'] ?? '') ?>" name="pet-name"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <!-- Age -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="pet-age">
                Age <span class="text-red-600"> <?= $errors['pet-age'] ?? '' ?></span>
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="pet-age" name="pet-age" type="number">
        </div>
        <!-- Poids -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="pet-weight">
                Poids <span class="text-red-600"> <?= $errors['pet-weight'] ?? '' ?></span>
            </label>
            <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="pet-weight" name="pet-weight" type="number">
        </div>
        <!-- Genre -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="pet-gender">
                Genre
            </label>
            <label for="">Male</label><input type="radio" name="pet-gender" value="Male" id="pet-gender" class="radio">
            <label for="">Femelle</label><input type="radio" name="pet-gender" value="Female" id="pet-gender"class="radio">
        </div>
        <!-- Tattouage -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="tatoo">
                Tattoué
            </label>
            <input type="checkbox" name="pet-tattooed" id="tatoo">
        </div>
        <!-- Puçage -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="puce">
                Pucé
            </label>
            <input type="checkbox" name="pet-tattooed" id="puce">
        </div>
        <!-- Couleur -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="color">
                Couleur
            </label>
            <select name="pet-color" id="color">
            <?php

                foreach ($color as $row) { ?>
                <option value=<?= $row['id_color'] ?> ><?= $row['color'] ?></option>
            <?php } ?>

            </select>
        </div>
        <!-- Espece -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="species">
                Espece
            </label>
            <select name="pet-specie" id="species">
            <?php

                foreach ($species as $row) { ?>
                <option value=<?= $row['id_species'] ?> ><?= $row['name'] ?></option>
            <?php } ?>

            </select>
        </div>
        <!-- Race -->
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="race">
                Race
            </label>
            <select name="pet-race" id="race">
            <?php

                foreach ($race as $row) { ?>
                <option value=<?= $row['id_race'] ?> ><?= $row['name'] ?></option>
            <?php } ?>
            </select>
        </div>
<!-- Boutton submit -->
<div class="flex items-center justify-between">
    <button
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
        type="submit">
        Ajouter
    </button>

</div>
</form>
</div>



</div>