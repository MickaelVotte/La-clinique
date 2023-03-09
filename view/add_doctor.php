<?php
session_start();

require_once '../controllers/controller_add_doctor.php';

include('../view/templates/header.php')
?>


<div class="text-center text-primary fs-3">Ajouter un spécialiste</div>


<div class="row d-flex justify-content-center m-0 p-0">
    <form class="col-lg-4 col-sm-12" action="" method="post">


        <div class="form-control text-center border border-primary shadow p-3 mb-5 rounded">
            <div>
                <label for="name">Nom: <span class="text-danger"><?= isset($errors['name']) ? $errors['name'] : '' ?></span></label>
                <br>
                <input type="text" id="name" name="name" required value="<?= $_POST['name'] ?? '' ?>">
            </div>
            <div>
                <label for="lastname">Prénom: <span class="text-danger"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></span> </label>
                <br>
                <input type="text" id="lastname" name="lastname" required value="<?=$_POST['lastname'] ?? ''?>">
            </div>
            <div>
                <label for="phonenumber">N°de télèphone: <span class="text-danger"> <?= isset($errors['phonenumber']) ? $errors['phonenumber'] : '' ?></span></label>
                <br>
                <input type="text" id="phonenumber" name="phonenumber" required value="<?= $_POST['phonenumber'] ?? '' ?>">
            </div>
            <div>
                <label for="mail">Email: <span class="text-danger"><?= isset($errors['mail']) ? $errors['mail'] : '' ?></span></label>
                <br>
                <input type="text" id="mail" name="mail" required value="<?= ($_POST['mail']) ?? '' ?>">
            </div>
            <div>
                <label for="medicalspecialities"><span></span>Spécialité</label>
                <br>
                <select name="medicalspecialities" id="medicalspecialities">
                    <option value="" disabled selected>choix de la spécialité</option>
                  <?php  foreach($arrayMedicalSpecialities as $value) { ?>
                    <option value="<?= $value['medicalspecialities_id'] ?>"><?=$value['medicalspecialities_name']?></option>
                  <?php  } ?>
                </select>
            </div>


            <div>
                <label for="password">Mot de passe: <span class="text-danger"><?= isset($errors['password']) ? $errors['password'] : '' ?></span></label>
                <br>
                <input type="password" id="password" name="password">
            </div>
            <div>
                <label for="confirmpassword">Confirmé Mot de passe: <span class="text-danger"><?= isset($errors['confirmPassword']) ? $errors['confirmPassword'] : '' ?></span> </label>
                <br>
                <input type="password" id="confirmpassword" name="confirmpassword">
            </div>

            <div class="m-5">
                <div>
                    <button class="btn btn-success">Ajouter</button>
                </div>
            </div>
            <div class="row justify-content-center">
                <a class="btn btn-secondary" href="./dashboard.php">Dashboard</a>
            </div>
        </div>

    </form>

</div>







<?php include('templates/footer.php') ?>