<?php

if(!isset($_SESSION['user'])){
    header ('Location: connection.php');
    exit();
}

require_once '../models/Database.php';
require_once '../models/Doctors.php';
require_once '../models/Patients.php';
require_once '../models/Rdv.php';
require_once '../config.php';


$rendezvousObj = new Rdv();






?>


