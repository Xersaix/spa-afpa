<div>
    <div class="max-w-sm bg-gray-500 border border-gray-200 rounded-lg shadow m-auto">
      <a href="#">
        <img class="rounded-t-lg h-96 " src="../assets/img/logo/img-chien-chat.avif" alt="" />
      </a>
      <div class="p-5">
        <a href="#">
          <h5 class="mb-2 text-2xl font-bold tracking-tight text-white text-center"> <?= $row['name'] ?></h5>
        </a>
        <ul class="mb-2 text-xl text-center text-white">
          <li>Race :  <?= $row['race'] ?></li>
          <li>Couleur : <?= $row['couleur'] ?></li>
          <li>Age : <?= $row['age'] ?> ans</li>
          <li>Poids : <?= $row['weight'] ?> kg</li>
        </ul>
        <a href="controller-animal.php?id=<?= $row['id_animal'] ?>" class=" w-1/2 flex mx-auto justify-center items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
          En savoir plus
        </a>
      </div>
    </div>
  </div>