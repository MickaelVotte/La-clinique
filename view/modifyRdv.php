<?php
session_start();

require_once '../controllers/controller_modifyRdv.php';


include('../view/templates/header.php')
?>




<div class="text-center text-primary fs-3">Modifier le Rendez-vous</div>

<div class="row d-flex justify-content-center m-0 p-0">

    <form class="col-lg-4 col-sm-12" action="" method="post">

        <div>
            <label for="date">Date:<span class="text-danger"><?= isset($errors['date']) ? $errors['date'] : '' ?></span></label>
            <br>
            <input type="date" name="date" id="date">
        </div>
        <div>
            <label for="start">début du rendez-vous:<span class="text-danger"><?= isset($errors['start']) ? $errors['start'] : '' ?></span></label>
            <br>
            <input type="time" name="start" id="start">
        </div>
        
    
        <div>
            <label for="description">description<span class="text-danger"><?= isset($errors['description']) ? $errors['description'] : '' ?></span></span></label>
            <br>
            <textarea name="description" type="description" id="description" value="" row="30" cols="60"></textarea>
        </div>
        
        <div>
            <label for="patients">patient:<span class="text-danger" <?= isset($errors['patients']) ? $errors['patients'] :''?>></span></label>
            <br>
            <select name="patients" id="patients">
                <option value="" disabled selected>Veuillez selectionner un client</option>
            <?php foreach($patientsArray as $value) { ?>
            <option value="<?= $value['patients_id'] ?>"><?=$value['patients_lastname']?></option>
            <?php } ?>
            </select>
        </div>

        <div>
            <label for="doctors">docteur:<span <?= isset($errors['doctors']) ? $errors['doctors'] :''?>></span></label>
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












<?php include('./templates/footer.php') ?>