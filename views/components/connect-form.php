


<div class="w-full  min-h-screen text-center flex justify-center items-center">
<form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="" method="POST">
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
        Nom d'utilisateur
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="username" id="username" type="text" placeholder="Username">
      <p class="text-red-500 text-xs italic"><?= $errors["username"] ?? '' ?></p>
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
        Mot de passe
      </label>
      <input class="shadow appearance-none border  rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password" id="password" type="password" placeholder="******************">
      <p class="text-red-500 text-xs italic"><?= $errors["password"] ?? '' ?></p>
    </div>
    <div class="flex flex-col items-center justify-between">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
       Se connecter
      </button>
      <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
        Mot de passe oublier?
      </a>
    </div>
  </form>




</div>