<?php

if(!isset($_SESSION['user'])){
    header ('Location: connection.php');
    exit();
}

// on unset et destroy les variables de session
session_unset();
session_destroy();


?>







?>