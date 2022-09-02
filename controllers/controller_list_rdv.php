<?php

if(!isset($_SESSION['user']))
{
    header('Location: connection.php');
}


require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Rdv.php';
require_once '../view/listRdv.php';


$allRdv = new Rdv();

$rendezvousArray = $allRdv->getAllRdv();
?>