<?php

if (!isset($_SESSION['user'])) {
    header('Location: connection.php');
    exit();
}

require_once '../models/Database.php';
require_once '../models/Doctors.php';
require_once '../models/Patients.php';
require_once '../models/Rdv.php';
require_once '../config.php';

$getpatientObj = new Patients();
$patientsArray = $getpatientObj->getAllPatients();

$getdoctorsObj = new Doctors();
$doctorsArray = $getdoctorsObj->getAllDoctors();




if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $errors = [];

    $regexName = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}$/";
}


if (isset($_POST['date'])) {
    if (empty($_POST['date'])) {
        $errors['date'] = ' Champ obligatoire';
    }

    if (empty($_POST['start'])) {
        $errors['start'] = ' Champ obligatoire';
    }
    
    if (empty($_POST['description'])) {
        $errors['description'] =' Champ obligatoire';
    } else if (!preg_match($regexName, $_POST['description'])) {
        $errors['description'] = 'Format invalide';
    }

    if (empty($_POST['patients'])) { {
            $errors['patients'] = "Veuillez sélectionner un patient";
        }
    }
    if (empty($_POST['doctors'])) {
        $errors['doctors'] = "Veuillez sélectionner un docteur";
    }



    if (count($errors) == 0) {
        $date = htmlspecialchars(($_POST['date']));
        $start = htmlspecialchars(($_POST['start']));
        $description = htmlspecialchars(($_POST['description']));
        $patient = intval($_POST['patients']);
        $doctor = intval($_POST['doctors']);


        $rdvObj = new Rdv;
        $rdvObj->addRdv($date, $start, $description, $patient, $doctor);


        
        header('Location: dashboard.php');
    }
}
