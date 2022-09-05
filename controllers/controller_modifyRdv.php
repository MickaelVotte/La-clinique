<?php

if(!isset($_SESSION['user'])){
    header('Location: connection.php');
    exit();
}


require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Rdv.php';

$rdv = new Rdv();

$infoRdv = $rdv->getOneRdv($_GET['id']);


if($_SERVER['REQUEST_METHOD'] == "POST"){


    $errors = [];

    $regexName = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,30}$/";


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
    
        if (!isset($_POST['patients'])) { {
                $errors['patients'] = "Veuillez sélectionner un patient";
            }
        }
        if (!isset($_POST['doctors'])) {
            $errors['doctors'] = "Veuillez sélectionner un docteur";
        }
    
    
        if (count($errors) == 0) {
            //je stock les valeurd des inputs dans des variables en  effectuant un htmlspecialchars afin de m'assurer que les données soient safe
            $date = htmlspecialchars(($_POST['date']));
            $start = htmlspecialchars(($_POST['start']));
            $description = htmlspecialchars(($_POST['description']));
            $patient = intval($_POST['patients']);
            $doctor = intval($_POST['doctors']);

            //J'instancie un objet $modifyRdvObj avec la class Rdv
            $modifyRdvObj = new Rdv();

            //je fais appelle à la méthode updatePatient pour modifier mon patient : Attention bien respecter l'ordre des parametres
            $modifyRdvObj->updateRdv($date, $hour, $description, $idPatient, $idDoctor);


            header('Location: dashboard.php');
        }

}
var_dump($errors);
}




?>
