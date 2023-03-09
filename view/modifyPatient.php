

<?php session_start(); ?>
<?php require_once '../controllers/controller_modifyPatient.php' ?>
<?php require_once '../models/Patients.php'  ?>
<?php include('../view/templates/header.php') ?>





<div class="text-center text-primary mb-5 mt-3 p-0">
    <p class="fs-3">Modifier les information du patient</p>
</div>


<div class="row d-flex justify-content-center m-0 p-0">
    <form class="col-lg-4 col-sm-12" action="" method="post">


        <div class="form-control text-center border border-primary shadow p-3 mb-5 bg-body rounded ">

            <div>
                <label for="lastname">Nom: <span class="text-danger"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></span></label>
                <br>
                <input id="lastname" name="lastname" type="text" required value="<?= $_POST['lastname'] ?? $infoPatient['patients_lastname'] ?>">
            </div>
            <div>
                <label for="firstname">Prénom: <span class="text-danger"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></span></label>
                <br>
                <input id="firstname" name="firstname" type="text" required value="<?= $_POST['firstname'] ?? $infoPatient['patients_firstname'] ?>">
            </div>
            <div>
                <label for="phonenumber">Numéro de télèphone: <span class="text-danger"><?= isset($errors['phonenumber']) ? $errors['phonenumber'] : '' ?></span></label>
                <br>
                <input id="phonenumber" name="phonenumber" type="text" required value="<?= $_POST['phonenumber'] ??  $infoPatient['patients_phonenumber'] ?>">
            </div>
            <div>
                <label for="address">adresse: <span class="text-danger"><?= isset($errors['address']) ? $errors['address'] : '' ?></span></label>
                <br>
                <input id="address" name="address" type="text" required value="<?= $_POST['address'] ?? $infoPatient['patients_address']  ?>">
            </div>
            <div>
                <label for="mail">Email: <span class="text-danger"><?= isset($errors['mail']) ? $errors['mail'] : '' ?></span></label>
                <br>
                <input id="mail" name="mail" type="mail" required value="<?= ($_POST['mail']) ?? $infoPatient['patients_mail']  ?>">
            </div>


            <div class="m-5">
                <div>
                    <input type="hidden" name="idPatient" value="<?=$infoPatient['patients_id'] ?>">
                    <button class="btn btn-success">Modifier</button>
                </div>
            </div>

    </form>

</div>




<div class="text-center mt-5">
    <a href="./dashboard.php">Retour sur le dashboard</a>

</div>




<?php include('templates/footer.php') ?>

