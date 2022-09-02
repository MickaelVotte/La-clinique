<?php

require_once '../config.php';
require_once '../models/Database.php';
require_once '../models/Users.php';
require_once '../models/Patients.php';

if($_SERVER['REQUEST_METHOD']=='POST'){

    $errors = [];
    $regexName = "/^[a-zA-Z]+$/";



    if(isset($_POST['login'])){
        
        if(empty($_POST['login'])){
            $errors['login'] = "champ obligatoire";
        
        }
    }


    if(isset($_POST['password'])){
        if(empty($_POST['password'])){
            $errors['password'] = "champ obigatoire";
    }

}

if(count($errors)==0){
    //j'instancie un nouvel object selon la class Users
    $usersObj = new Users();

    //verification si le mail existe à l'aide de la méthode de l'objet checkIfMailExists
    if($usersObj->checkIfMailExists($_POST['login'])){

        //nous allons récupérer toutes les infos du Users et les stockers dans une variable $userInfos à l'aide du mail.
        $usersInfos = $usersObj->getInfosUsers($_POST['login']);
        
        //je récupère le password haché dans le tableau $usersInfos
        //j'utilise ensuite la fonction password_verify pour vérifier le mdp hashé
        if(password_verify($_POST['password'], $usersInfos['users_password'])){
            $_SESSION['user'] = $usersInfos;
            header('Location: dashboard.php');
        }
        else{
             $errors['connection'] = "Identifiant ou Mdp incorrect";
        }

        
        
    }else {
        $errors['connection'] = "Identifiant ou Mdp incorrect";
    }
}




}
