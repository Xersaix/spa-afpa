<?php include "components/head.php" ?>
<?php include "components/navbar.php" ?>


<a href="controller-admin.php">
<button type="button" class="text-white bg-gray-700 m-5 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm p-2.5 text-center inline-flex items-center mr-2 dark:bg-gray-700 dark:hover:bg-gray-700dark:focus:ring-blue-800"style="transform:rotate(0.5turn)">
  <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
  </svg>
  <span class="sr-only">Icon description</span>
</button>
</a>
<h1 class="text-5xl mt-4 mb-8 text-center text-gray-800 font-extrabold">Liste de nos animaux</h1>


<?php 

include "components/list.php"
?>

<?php include "components/footer.php" ?>