<?php

if (!isset($_SESSION['user'])) {
    header('Location: connection.php');
    exit();
}
require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Patients.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $errors = [];


    $regexName = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}$/";

    $regexPhoneNumber = "/^[0-9]{10}+$/";




    if (isset($_POST['lastname'])) {
        if (empty($_POST['lastname'])) {
            $errors['lastname'] = 'Champ obligatoire';
        } else if (!preg_match($regexName, $_POST['lastname'])) {
            $errors['lastname'] = 'Format invalide';
        }
    }

    if (isset($_POST['firstname'])) {
        if (empty($_POST['firstname'])) {
            $errors['firstname'] = 'Champ obligatoire';
        } else if (!preg_match($regexName, $_POST['firstname'])) {
            $errors['firstname'] = 'Format invalide, ex. DUPONT';
        }
    }

    if (isset($_POST['phonenumber'])) {
        if (empty($_POST['phonenumber'])) {
            $errors['phonenumber'] = 'Champ obligatoire';
        } else if (!preg_match($regexPhoneNumber, $_POST['phonenumber'])) {
            $errors['phonenumber'] = 'Format invalide, ex 0699550214';
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

    if (isset($_POST['address'])) {
        if (empty($_POST['address'])) {
            $errors['address'] = 'champ obligatoire';
        }
    }


    //nous allons créer un patient dans la table 'patients'

    if (count($errors) == 0) {
        //je stock les valeurd des inputs dans des variables en  effectuant un htmlspecialchars afin de m'assurer que les données soient safe

        $lastname = htmlspecialchars($_POST['lastname']);
        $firstname = htmlspecialchars($_POST['firstname']);
        $phonenumber = htmlspecialchars($_POST['phonenumber']);
        $address = htmlspecialchars($_POST['address']);
        $mail = htmlspecialchars($_POST['mail']);


        //j'instancie un objet $patientObj avec la class Patients
        $patientObj = new Patients();

        //je fais appelle à la méthode addPatient pour ajouter mon patient : Attention bien respecter l'ordre des parametres
        $patientObj->addPatient($lastname, $firstname, $phonenumber, $address, $mail);



        header('Location: dashboard.php');
    }
   
}
