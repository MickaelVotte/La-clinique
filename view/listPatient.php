<?php
session_start();
require_once '../controllers/controller_list_patients.php';
include('../view/templates/header.php');

?>

<div class="text-center text-primary fs-3 mt-3 mb-3">
    <p>Liste des Patients</p>
</div>



<div class="row d-flex-justify-content-center m-0 p-0">
    <div class="">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénon</th>
                    <th scope="col">Information</th>
                    <th scope="col">Modifier</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php foreach ($patientArray as $patient) { ?>
                    <tr>
                        <td><?= $patient['patients_id'] ?></td>
                        <td class="text-uppercase"><?= $patient['patients_lastname'] ?></td>
                        <td><?= $patient['patients_firstname'] ?></td>

                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#patient-<?= $patient['patients_id'] ?>">
                                Plus d'infos
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="patient-<?= $patient['patients_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Fiche Patient</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">id</th>
                                                        <th scope="col">Nom</th>
                                                        <th scope="col">Prénon</th>
                                                        <th scope="col">N° de Télèphone</th>
                                                        <th scope="col">adresse</th>
                                                        <th scope="col">mail</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?= $patient['patients_id'] ?></td>
                                                        <td class="text-uppercase"><?= $patient['patients_lastname'] ?></td>
                                                        <td><?= $patient['patients_firstname'] ?></td>
                                                        <td><?= $patient['patients_phonenumber'] ?></td>
                                                        <td><?= $patient['patients_address'] ?></td>
                                                        <td><?= $patient['patients_mail'] ?></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>   
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <a href="./modifyPatient.php?id=<?=$patient['patients_id'] ?>">Modifier</a>
                </button>
                        </td>
                    </tr>
                <?php } ?>


            </tbody>
        </table>
    </div>


</div>




<div class="text-center mt-5">
    <a href="./dashboard.php">Retour sur le dashboard</a>

</div>




<?php include('templates/footer.php') ?>