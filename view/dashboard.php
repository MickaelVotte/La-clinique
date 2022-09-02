<?php session_start() ?>
<?php include('../view/templates/header.php') ?>
<?php require_once '../controllers/controller_dashboard.php' ?>

<div class="p-3">
    <p class="h2 text-center">Bienvenue</p>
    <div class="row justify-content-evenly text-light py-5">
        <div class="col-lg-5 col-10 text-center">
            <div class="row justify-content-center">
                <a class="col-lg-5 col-8 my-3 text-center p-3 mx-3 btn btn-primary text-decoration-none text-light" href="./add_patients.php">Ajouter patient</a>
                <a href="../view/listPatient.php" class="text-decoration-none text-light col-lg-5 col-8 my-3 text-center p-3 mx-3 btn btn-primary">Gestion des patient</a>
                <a href="../view/add_rdv.php" class="text-decoration-none text-light col-lg-5 col-8 my-3 text-center p-3 mx-3 btn btn-primary">Ajouter rendez vous</a>
                <a href="./listRdv.php" class="text-decoration-none text-light col-lg-5 col-8 my-3 text-center p-3 mx-3 btn btn-primary">Gestion des rendez vous</a>
                <a href="./add_doctor.php" class="text-decoration-none text-light col-lg-5 col-8 my-3 text-center p-3 mx-3 btn btn-primary">Ajouter spécialiste</a>
                <a href="./listDoctor.php" class="text-decoration-none text-light col-lg-5 col-8 my-3 text-center p-3 mx-3 btn btn-primary">Gestion des spécialistes</a>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <a href="logout.php" class="btn btn-secondary mt-3 col-3">Deconnexion</a>
    </div>

</div>











<?php include('templates/footer.php') ?>