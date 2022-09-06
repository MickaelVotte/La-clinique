<?php

if(!isset($_SESSION['user']))
{
    header('Location: connection.php');
    exit();
}

require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Doctors.php';




if(isset($_GET['action']) && isset($_GET['idDoctor']) && $_GET['action'] == 'delete')
{
    $deleteDoctor = new Doctors();

    $deleteDoctor->deleteDoctor($_GET['idDoctor']);
}

//j'instancie un nouvel objet $alldoctors selon la classe Doctors

$allDoctors = new Doctors();

//je crée une variable $doctorArray qui va contenir tous les specialistes dans un array
$doctorArray = $allDoctors->getAllDoctors();

?>