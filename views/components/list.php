




<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST["delete"]))
    {
        Animal::deleteAnimal($_POST["delete"]);
    }
}
    $conn = Database::connectDatabase();
    $result = Animal::getAllAnimal();
?>

<div class="min-h-screen">

<!-- Modal -->
<?php

foreach ($result as $row) { ?>


      
      <div id="popup-modal-<?= $row['id_animal'] ?>" tabindex="-1" class="my-modal fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
          <div class="relative w-full max-w-md max-h-full">
              <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                  <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal-<?= $row['id_animal'] ?>">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
                  <div class="p-6 text-center">
                      <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                      </svg>
                      <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Êtes-vous sûr de vouloir supprimer cette animal  ?</h3>
                      <form action="" method="POST" class="inline">
                        <button data-modal-hide="popup-modal"  name="delete" value=<?= $row['id_animal'] ?> type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                          Oui
                        </button>
                      </form>
                      <button data-modal-hide="popup-modal-<?= $row['id_animal'] ?>" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No</button>
                  </div>
              </div>
          </div>
      </div>
      

<?php } ?>
<!-- Liste affichage -->
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3">
                    <p class="text-center">ID</p>
                </th>
                <th scope="col" class="py-3 ">
                    <p class="text-center"> Nom</p>
                </th>
                <th scope="col" class="py-3 max-sm:hidden">
                    <p class="text-center"> Age</p>
                </th>
                <th scope="col" class="py-3  max-sm:hidden">
                    <p class="text-center"> Genre</p>
                </th>
                <th scope="col" class="py-3 max-sm:hidden">
                    <p class="text-center"> Poids</p>
                </th>
                <th scope="col" class="py-3 max-sm:hidden">
                    <p class="text-center">Tattoué</p>
                </th>
                <th scope="col" class="py-3 max-sm:hidden">
                    <p class="text-center"> Pucé</p>
                </th>
                <th scope="col" class="py-3 ">
                    <p class="text-center"> Couleur</p>
                </th>
                <th scope="col" class="py-3 ">
                    <p class="text-center"> Espece</p>
                </th>
                <th scope="col" class="py-3 ">
                    <p class="text-center">Race</p>
                </th>
                <th scope="col" class="py-3 ">
                    <p class="text-center"> Modifier</p>
                </th>
                <th scope="col" class="py-3 ">
                    <p class="text-center"> Supprimer</p>
                </th>
            </tr>
        </thead>
        <tbody>

            <?php

                foreach ($result as $row) { ?>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="py-4 font-medium text-gray-900 whitespace-nowrap">
                    <p class="text-center text-white">
                        <?= $row['id_animal'] ?>
                    </p>
                </th>
                <td class=" py-4">
                    <p class="text-center">
                        <?= $row['name'] ?>
                    </p>
                </td>
                <td class=" py-4 max-sm:hidden">
                    <p class="text-center ">
                        <?= $row['age'] ?> ans
                    </p>
                </td>
                <td class=" py-4 max-sm:hidden">
                    <p class="text-center ">
                        <?= $row['gender'] ?>
                    </p>
                </td>
                <td class=" py-4 max-sm:hidden">
                    <p class="text-center">
                        <?= $row['weight'] ?> kg
                    </p>
                </td>
                <td class=" py-4 max-sm:hidden">
                    <p class="text-center">
                        <?= $row['tatoo'] ? "Oui" : "Non" ?>
                    </p>
                </td>
                <td class=" py-4 max-sm:hidden">
                    <p class="text-center">
                        <?= $row['chip']  ? "Oui" : "Non" ?>
                    </p>
                </td>
                <td class=" py-4">
                    <p class="text-center">
                        <?= $row['couleur'] ?>
                    </p>
                </td>

                <td class=" py-4">
                    <p class="text-center">
                        <?= $row['espece'] ?>
                    </p>
                </td>
                <td class=" py-4">
                    <p class="text-center">
                        <?= $row['race'] ?>
                    </p>
                </td>
                <td class=" py-4">
                <span class="flex  flex-nowrap flex-initial justify-center"> <a href="controller-update-form.php?id=<?= $row['id_animal'] ?>"> <button name="update" value=<?= $row['id_animal'] ?> class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-2 py-1   dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"><i class="bi bi-pencil-square"></i></button></a></span>
                </td>
                <td class=" py-4 ">
                    <span class="flex  flex-nowrap flex-initial justify-center"><button  data-modal-target="popup-modal-<?= $row['id_animal'] ?>" data-modal-toggle="popup-modal-<?= $row['id_animal'] ?>"   class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-2 py-1  dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"><i class="bi bi-x-lg text-red-600"></i></button></span>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

                </div>

<script src="../assets/script/modal.js"></script>