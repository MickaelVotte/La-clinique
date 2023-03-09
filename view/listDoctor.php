<?php
session_start();

require_once '../controllers/controller_list_doctors.php';
include('../view/templates/header.php')


?>




<div class="row text-center d-flex-justify-content-center fs-3 mt-3 mb-3 m-0 p-0">
    <p>Liste des Spécialistes</p>
</div>

<div class="row d-flex-justify-content-center m-0 p-0">
    <div class="ps-5 pe-5">
        <table class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénon</th>
                    <th scope="col">Spécialité</th>
                    <th scope="col">Information</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>


                </tr>
            </thead>
            <tbody class="text-center">

                <?php

                foreach ($doctorArray as $doctors) { ?>
                    <tr>

                        <td><?= $doctors['doctors_id'] ?></td>
                        <td class="text-uppercase"><?= $doctors['doctors_name'] ?></td>
                        <td><?= $doctors['doctors_lastname'] ?></td>
                        <td><?= $doctors['medicalspecialities_name'] ?></td>


                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#doctorInfo-<?= $doctors['doctors_id'] ?>">
                                Plus d'infos
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="doctorInfo-<?= $doctors['doctors_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Fiche Medecin</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Id</th>
                                                        <th scope="col">Nom</th>
                                                        <th scope="col">Prénon</th>
                                                        <th scope="col">N° de Télèphone</th>
                                                        <th scope="col">Mail</th>
                                                        <th scope="col">Spécialité</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td><?= $doctors['doctors_id'] ?></td>
                                                        <td class="text-uppercase"><?= $doctors['doctors_name'] ?></td>
                                                        <td><?= $doctors['doctors_lastname'] ?></td>
                                                        <td><?= $doctors['doctors_phonenumber'] ?></td>
                                                        <td><?= $doctors['doctors_mail'] ?></td>
                                                        <td><?= $doctors['medicalspecialities_name'] ?></td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>


                        <td>
                            <div class="btn btn-info"><a href="./modifyDoctor.php?id=<?= $doctors['doctors_id'] ?>">Modifier</a>
                            </div>
                        </td>



                        <td> <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#doctors-<?= $doctors['doctors_id'] ?>">
                                Supprimer
                            </button>

                            <!-- Modal -->
                            <?php foreach ($doctorArray as $doctors) { ?>
                                <div class="modal fade" id="doctors-<?= $doctors['doctors_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Supprimer le docteur</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Voulez vous supprimer le docteur <?= $doctors['doctors_lastname'] ?> ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Non</button>
                                                <a href="listDoctor.php?action=delete&idDoctor=<?= $doctors['doctors_id'] ?>" class="btn btn-success" value="">Oui</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
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