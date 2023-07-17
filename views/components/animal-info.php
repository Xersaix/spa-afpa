<?php

$result = Animal::getAnimal($_GET["id"]);


?>
<a href="controller-home.php">
<button type="button" class="text-white bg-gray-700 m-5 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-gray-700 dark:hover:bg-gray-700dark:focus:ring-blue-800"style="transform:rotate(0.5turn)">
  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
  </svg>
  <span class="sr-only">Icon description</span>
</button>
</a>
<div class="my-2">
    <p class="lol text-center text-6xl font-bold"><?= $result[0]['name'] ?></p>
</div>
<div class="flex flex-row justify-around bg-gray-700">
    <div class="flex flex-col w-1/2 md:w-1/4 lg:w-1/4 justify-start items-center">
        <p class="text-yellow-400 text-2xl font-bold w-1/2 text-center mx-auto">Espèce</p>
        <p class="border-2 border-yellow-300 font-bold md:w-1/4 lg:w1/4 mx-auto text-xl rounded text-center bg-yellow-300 my-4"><?= $result[0]['espece'] ?></p>
        <div class="flex justify-between items-center sm:w-2/6 md:w-2/6 lg:w-2/6 mb-2 gap-2">
            <i class="fa-solid fa-cat fa-2xl" style="color: #FACC15;"></i>
            <p class="text-white text-2xl"><?= $result[0]['couleur'] ?></p>
        </div>
        <div class="flex justify-between items-center sm:w-2/6 md:w-2/6 lg:w-2/6 mb-2 gap-2">
            <i class="fa-solid fa-cake-candles fa-2xl" style="color: #FACC15;"></i>
            <p class="text-white text-2xl"><?= $result[0]['age'] ?> ans</p>
        </div>
        <div class="flex justify-between items-center sm:w-2/6 md:w-2/6 lg:w-2/6 mb-2 gap-2">
            <i class="fa-solid fa-venus-mars fa-2xl" style="color: #FACC15;"></i>
            <p class="text-white text-2xl"><?= $result[0]['gender'] ?></p>
        </div>
    </div>
    <div class="hidden sm:block md:block lg:block flex flex-col w-1/2 md:w-1/4 lg:w-1/4 justify-start items-center">
        <img class="h-96 " src="../assets/img/logo/img-chien-chat.avif" alt="" />
    </div>
    <div class="flex flex-col w-1/2 md:w-1/4 lg:w-1/4 justify-start items-center">
        <p class="text-yellow-400 text-2xl w-1/2 font-bold text-center mx-auto">Race</p>
        <p class="border-2 border-yellow-300 font-bold md:w-1/4 lg:w1/4 mx-auto text-xl rounded text-center bg-yellow-300 my-4"><?= $result[0]['race'] ?></p>
        <div class="flex justify-between items-center sm:w-2/6 md:w-2/6 lg:w-2/6 mb-2 gap-2">
            <i class="fa-solid fa-microchip fa-2xl" style="color: #FACC15;"></i>
            <p class="text-white text-2xl"><?= $result[0]['chip'] ? "Pucé" : "Non Pucé" ?></p>
        </div>
        <div class="flex justify-between items-center sm:w-2/6 md:w-2/6 lg:w-2/6 mb-2 gap-2">
            <i class="fa-solid fa-syringe fa-2xl" style="color: #FACC15;"></i>
            <p class="text-white text-2xl"><?= $result[0]['tatoo'] ? "Tattoué" : "Non Tattoué" ?></p>
        </div>
    </div>
</div>
<div class="sm:hidden md:hidden lg:hidden flex flex-col w-screen mb-4 sm:w-1/2 md:w-1/4 lg:w-1/4 mx-auto">
    <img class="h-96 " src="../assets/img/logo/img-chien-chat.avif" alt="" />
</div>