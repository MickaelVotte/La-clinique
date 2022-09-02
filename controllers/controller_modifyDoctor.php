<?php

if (!isset($_SESSION['user'])) {
    header('Location: connection.php');
    exit();
}


require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Doctors.php';
require_once '../models/Users.php';
require_once '../models/MedicalSpecialities.php';

 

$medicalspecialitiesObj = new Medicalspecialities();

$arrayMedicalSpecialities = $medicalspecialitiesObj->getMedicalspecialities();



$doctor = new Doctors();

$infoDoctor = $doctor->getOneDoctor($_GET['id']);

var_dump($infoDoctor);

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $errors = [];


    $regexName = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}$/";

    $regexPhoneNumber = "/^[0-9]{10}+$/";


    if (isset($_POST['name'])) {
        if (empty($_POST['name'])) {
            $errors['name'] = 'Champ obligatoire';
        } else if (!preg_match($regexName, $_POST['name'])) {
            $errors['name'] = 'Format invalide';
        }
    }

    if (isset($_POST['lastname'])) {
        if (empty($_POST['lastname'])) {
            $errors['lastname'] = 'Champ obligatoire';
        } else if (!preg_match($regexName, $_POST['lastname'])) {
            $errors['lastname'] = 'Format invalide, ex. LEBON';
        }
    }

    if (isset($_POST['phonenumber'])) {
        if (empty($_POST['phonenumber'])) {
            $errors['phonenumber'] = 'Champ obligatoire';
        } else if (!preg_match($regexPhoneNumber, $_POST['phonenumber'])) {
            $errors['phonenumber'] = 'Format invalide, ex 0689560044';
        }
    }


    if (isset($_POST['mail'])) {
        if (empty($_POST['mail'])) {
            $errors['mail'] = "Champ obligatoire";
            // on contrôle le format du mail à l'aide d'un filtar_var et filter_validate_email
        } else if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $errors['mail'] = "Format mail invalide";
        }
    }


    if(!isset($_POST['medicalspecialities'])){
        $errors['medicalspecialities'] = "Veuillez sélectionner une spécialité";
    }



    if (isset($_POST['password'])) {
        // si password est vide
        if ($_POST['password'] == '') {
            $errors['password'] = "Champ obligatoire";
            // si confirmPassword est vide et que password n'est pas vide
        } else if ($_POST['confirmpassword'] == '' && $_POST['password'] != '') {
            $errors['confirmpassword'] = "Champ obligatoire";
            // si les mots de passe sont différents
        } else if ($_POST['confirmpassword'] != $_POST['password']) {
            $errors['password'] = "Les mots de passe sont différents";
        }
    };
   
       



    if(count($errors)== 0){
           //je stock les valeurd des inputs dans des variables en  effectuant un htmlspecialchars afin de m'assurer que les données soient safe
        
        $name = htmlspecialchars(($_POST['name']));
        $lastname = htmlspecialchars(($_POST['lastname']));
        $phonenumber = htmlspecialchars(($_POST['phonenumber']));
        $mail = htmlspecialchars(($_POST['mail']));
        $medicalspecialities = intval($_POST['medicalspecialities']);
        $idDoctor = htmlspecialchars($_POST['idDoctor']);


         //j'instancie un objet $patientObj avec la class Doctors
       $modifyDoctorObj = New Doctors();

       $modifyDoctorObj->updateDoctor( $name, $lastname, $phonenumber, $mail,$medicalspecialities, $idDoctor);

      
       header('Location: dashboard.php');

    
    }

}