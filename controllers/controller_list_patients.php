<?php


if (!isset($_SESSION['user'])) {
    header('Location: connection.php');
    exit();
}
require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Patients.php';



if(isset($_GET['action']) && isset($_GET['idPatient']) && $_GET['action'] == 'delete')
{
    $deletePatient = new Patients();
    
    $deletePatient->deletePatient($_GET['idPatient']);
}


//j'instancie un nouvel objet $allpatients selon la classe Patients
$allPatients = new Patients();

//je créé une variable $patientArray qui va contenir tous les patients dans un array
$patientArray = $allPatients->getAllPatients();