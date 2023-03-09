<?php
session_start();

require_once '../controllers/controller_logout.php'
?>



<?php
include('templates/header.php');
?>


<h1 class="mt-5 title text-center">Deconnexion</h1>
<div class="text-center">
    <p class="m-3">Vous vous êtes bien deconnecté(e)</p>

    <a class="m-3" href="./connection.php">Retour à la page de connexion</a>

</div>
<?php
include('templates/footer.php');
?>