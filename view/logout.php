<?php
session_start();

require_once '../controllers/controller_logout.php'
?>



<?php
include('templates/header.php');
?>


<h1 class="mt-5 title text-center">Deconnexion</h1>
<p>Vous vous êtes bien deconnecté(e)</p>

<a href="./connection.php">Retour à la page de connexion</a>
<?php 
include('templates/footer.php');