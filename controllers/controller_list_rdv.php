<?php

if (!isset($_SESSION['user'])) {
    header('Location: connection.php');
}


require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Rdv.php';
require_once '../view/listRdv.php';


if (isset($_GET['action']) && isset($_GET['idRdv']) && $_GET['action'] == 'delete') {
    $deleteRdv = new Rdv();

    $deleteRdv->deleteRdv($_GET['idRdv']);
}

$allRdv = new Rdv();

if ($_SESSION['user']['role_id_role'] == '3') {
    echo 'coucou';
    $rendezvousArray = $allRdv->getDoctorRdv($_SESSION['user']['users_mail']);
} else {

     $rendezvousArray = $allRdv->getAllRdv();
}

