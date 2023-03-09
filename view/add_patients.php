<?php session_start() ?>
<?php require_once '../controllers/controller_add_patients.php' ?>


<?php include('../view/templates/header.php') ?>


<div class="text-center text-primary mb-5 mt-3 p-0">
    <p class="fs-3">ajouter un patient</p>
</div>


<div class="row d-flex justify-content-center m-0 p-0">
    <form class="col-lg-4 col-sm-12" action="" method="post">


        <div class="form-control text-center border border-primary shadow p-3 mb-5 bg-body rounded ">

            <div>
                <label for="lastname">Nom: <span class="text-danger"><?= isset($errors['lastname']) ? $errors['lastname'] : '' ?></span></label>
                <br>
                <input id="lastname" name="lastname" type="text" required value="<?= $_POST['lastname'] ?? '' ?>">
            </div>
            <div>
                <label for="firstname">Prénom: <span class="text-danger"><?= isset($errors['firstname']) ? $errors['firstname'] : '' ?></span></label>
                <br>
                <input id="firstname" name="firstname" type="text" required value="<?= $_POST['firstname'] ?? '' ?>">
            </div>
            <div>
                <label for="phonenumber">Numéro de télèphone: <span class="text-danger"><?= isset($errors['phonenumber']) ? $errors['phonenumber'] : '' ?></span></label>
                <br>
                <input id="phonenumber" name="phonenumber" type="text" required value="<?= $_POST['phonenumber'] ?? '' ?>">
            </div>
            <div>
                <label for="address">Adresse: <span class="text-danger"><?= isset($errors['address']) ? $errors['address'] : '' ?></span></label>
                <br>
                <input id="address" name="address" type="text" required value="<?= $_POST['address'] ?? '' ?>">
            </div>
            <div>
                <label for="mail">Email: <span class="text-danger"><?= isset($errors['mail']) ? $errors['mail'] : '' ?></span></label>
                <br>
                <input id="mail" name="mail" type="mail" required value="<?= ($_POST['mail']) ?? '' ?>">
            </div>


            <div class="m-5">
                <div>
                    <button class="btn btn-success">Ajouter</button>
                </div>
            </div>

    </form>

    <div class="row justify-content-center">
        <a class="btn btn-secondary" href="./dashboard.php">Dashboard</a>
    </div>
</div>









<?php include('templates/footer.php') ?>