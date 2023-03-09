<?php

session_start();

require_once '../controllers/controller_list_rdv.php';
include('../view/templates/header.php');

?>


<div class="row text-center d-flex-justify-content-center fs-3 mt-3 mb-3 m-0 p-0">
    <p>Liste des Rendez Vous</p>
</div>

<div class="row d-flex-justify-content-center m-0 p-0">
    <div class="ps-5 pe-5">
        <table class="table table-striped">
            <thead class="text-center">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Date</th>
                    <th scope="col">Heure</th>
                    <th scope="col">Description</th>
                    <th scope="col">Patient</th>
                    <th scope="col">Docteur</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php

                foreach ($rendezvousArray as $rdv) { ?>
                    <tr>
                        <td><?= $rdv['rendezvous_id'] ?></td>
                        <td><?= $rdv['rendezvous_date'] ?></td>
                        <td><?= $rdv['rendezvous_hour'] ?></td>
                        <td><?= $rdv['rendezvous_description'] ?></td>
                        <td><?= $rdv['patients_firstname'] ?></td>
                        <td><?= $rdv['medicalspecialities_name'] ?></td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal"><a href="./modifyRdv.php?id=<?= $rdv['rendezvous_id'] ?>">Modifier</a>

                            </button>


                        </td>

                        <td> <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rdv-<?= $rdv['rendezvous_id'] ?>">
                                Supprimer
                            </button>

                            <!-- Modal -->
                            <?php foreach ($rendezvousArray as $rdv) { ?>
                                <div class="modal fade" id="rdv-<?= $rdv['rendezvous_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Supprimer le docteur</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Voulez vous supprimer le docteur <?= $rdv['rendezvous_date'] ?> ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Non</button>
                                                <a href="listRdv.php?action=delete&idRdv=<?= $rdv['rendezvous_id'] ?>" class="btn btn-success" value="">Oui</a>
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