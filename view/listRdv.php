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
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">date</th>
                    <th scope="col">heure</th>
                    <th scope="col">description</th>
                    <th scope="col">patient</th>
                    <th scope="col">docteur</th>
                </tr>
            </thead>
            <tbody class="">
                <?php
                
                foreach ($rendezvousArray as $rdv) { ?>
                    <tr>
                        <td><?= $rdv['rendezvous_id'] ?></td>
                        <td><?=$rdv['rendezvous_date']?></td>
                        <td><?=$rdv['rendezvous_hour']?></td>
                        <td><?=$rdv['rendezvous_description']?></td>
                        <td><?=$rdv['doctors_name']?></td>
                        <td><?=$rdv['medicalspecialities_name']?></td>
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