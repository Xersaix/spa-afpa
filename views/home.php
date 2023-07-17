
<?php include "components/head.php" ?>
<?php include "components/navbar.php" ?>

<h1 class="text-5xl mt-4 mb-8 text-center text-gray-800 font-extrabold">Nos pensionnaires</h1>
<!-- Container for animal card -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4 mt-4 mb-64">
<?php

foreach ($result as $row) { 

include "components/card.php";

             } ?>
</div>
<?php include "components/footer.php" ?>