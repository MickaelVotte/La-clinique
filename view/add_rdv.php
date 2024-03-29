<?php
session_start();
require_once '../controllers/controller_add_rdv.php';
include('../view/templates/header.php')
?>

<div class="text-center text-primary fs-3">Prise de Rendez-vous</div>

<div class="row d-flex justify-content-center m-0 p-0">

    <form class="col-lg-4 col-sm-12" action="" method="post">

        <div>
            <label for="date">Date:<span class="text-danger"><?= isset($errors['date']) ? $errors['date'] : '' ?></span></label>
            <br>
            <input type="date" name="date" id="date">
        </div>
        <div>
            <label for="start">Début du rendez-vous:<span class="text-danger"><?= isset($errors['start']) ? $errors['start'] : '' ?></span></label>
            <br>
            <input type="time" name="start" id="start">
        </div>
        
    
        <div>
            <label for="description">Description<span class="text-danger"><?= isset($errors['description']) ? $errors['description'] : '' ?></span></span></label>
            <br>
            <textarea name="description" type="description" id="description" value="" row="30" cols="60"></textarea>
        </div>
        
        <div>
            <label for="patients">Patient:<span class="text-danger"></span></label>
            <br>
            <select name="patients" id="patients">
                <option value="" disabled selected>Veuillez selectionner un client</option>
            <?php foreach($patientsArray as $value) { ?>
            <option value="<?= $value['patients_id'] ?>"><?=$value['patients_lastname']?></option>
            <?php } ?>
            </select>
        </div>

        <div>
            <label for="doctors">Docteur:<span></span></label>
            <br>
            <select name="doctors" id="doctors">
            <option value="" disabled selected>Veuillez selectionner un docteur</option>
                <?php foreach($doctorsArray as $value) { ?>
            <option value="<?= $value['doctors_id'] ?>"><?=$value['doctors_name']?></option>
            <?php } ?>
            
            </select>
        </div>



        <div class="m-5">
                <div>
                    <button class="btn btn-success">Ajouter</button>
                </div>
            </div>
            <div class="row justify-content-center m-2">
                <a class="btn btn-secondary" href="./dashboard.php">Dashboard</a>
            </div>

    </form>


</div>





















<?php include('templates/footer.php') ?>