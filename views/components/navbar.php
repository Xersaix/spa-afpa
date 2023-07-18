



<nav class="bg-white border-gray-200 bg-gray-900">
    <div class="navbg max-w-full flex flex-wrap items-center h-32 justify-between mx-auto p-4">
        <a href="controller-home.php" class="flex items-center">
            <img src="../assets/img/logo/600.jpg" class="h-20 mr-3" alt="Au Refuge" />
            <span class="titlesite p-4 text-4xl font-extrabold">Au Refuge</span>
        </a>
        <div class="flex items-center md:order-2 ">
            <button type="button" class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="../assets/img/logo/user.jpg" alt="user photo">
            </button>
            <!-- Dropdown menu -->
            <div class="z-12 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow" id="user-dropdown">
            <?php if($connected == true) { ?>
                <div class="px-4 py-3">
                    <span class="block text-sm text-gray-900"><?= $_SESSION["username"] ?? ""  ?></span>
                    <span class="block text-sm  text-gray-500 truncate"><?= $_SESSION["mail"] ?? ""  ?></span>
                </div>
                <?php } ?>
                <ul class="py-2" aria-labelledby="user-menu-button">

                <?php if($connected == false) { ?>
                    <li>
                        <a href="controller-sign-in.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">S'inscrire</a>
                    </li>
                    <?php } ?>
                    <?php if($connected == false) { ?>
                    <li>
                        <a href="controller-connect.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Se connecter</a>
                    </li>
                    <?php } ?>

                    <?php if($connected == true) { ?>
                    <li>
                        <a href="controller-deco.php" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Se déconnecter</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="bg-gray z-0 items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul class="bg-gray flex flex-col font-medium p-4 text-white md:p-0 mt-4 border border-gray-100  md:flex-row md:space-x-8 md:mt-0 md:border-0 ">
                <li>
                    <a href="#" class="block py-2 pl-3 pr-4 text-white rounded hover:bg-yellow-400 hover:text-gray-700 md:hover:bg-transparent md:hover:text-yellow-400 md:p-0" aria-current="page">Accueil</a>
                </li>
                <li>
                    <a href="#" class="block py-2 pl-3 pr-4 text-white rounded hover:bg-yellow-400 hover:text-gray-700 md:hover:bg-transparent md:hover:text-yellow-400 md:p-0">Qui sommes-nous ?</a>
                </li>
                <li>
                    <a href="#" class="block py-2 pl-3 pr-4 text-white rounded hover:bg-yellow-400 hover:text-gray-700 md:hover:bg-transparent md:hover:text-yellow-400 md:p-0">Adoptez-nous</a>
                </li>
                <?php if($connected == true) { ?>
                <li>
                    <a href="controller-admin.php" class="block py-2 pl-3 pr-4 text-white rounded hover:bg-yellow-400 hover:text-gray-700 md:hover:bg-transparent md:hover:text-yellow-400 md:p-0">Admin</a>
                </li>

                <?php } ?>
                <li>
                    <a href="#" class="block py-2 pl-3 pr-4 text-white rounded hover:bg-yellow-400 hover:text-gray-700 md:hover:bg-transparent md:hover:text-yellow-400 md:p-0">Nous trouver</a>
                </li>
                <li>
                    <a href="../form.php" class="block py-2 pl-3 pr-4 text-white rounded hover:bg-yellow-400 hover:text-gray-700 md:hover:bg-transparent md:hover:text-yellow-400 md:p-0">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>