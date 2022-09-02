<?php session_start(); ?>
<?php include('../view/templates/header.php') ?>
<?php require_once '../controllers/controller_connection.php' ?>
 
<?php  
//cela permet d'utiliser les variables de session: $_session

?>


<div class="text-center text-primary mb-5 mt-3 p-0">
    <p>IDENTIFICATION</p>
</div>



<div class="row d-flex justify-content-center m-0 p-0">
    <form class="col-lg-4 col-sm-12" method="POST" action="">

        <div class="form-control text-center border border-primary shadow p-3 mb-5 bg-body rounded ">
            <div class="mt-5 mb-2">
                <label for="login">identifiant:</label>
                <br>
                <input type="text" id="login" name="login"  value="<?= isset($errors['login']) ? $_POST['login'] : '' ?>">
                <br>
                <span class="text-danger fst-italic"><?= isset($errors['login']) ? $errors ['login'] : '' ?></span>
            </div>
            <div class="mt-2 mb-2">
                <label for="password">Mot de passe:</label>
                <br>
                <input id="password" type="password" name="password" value="<?= isset($errors['password']) ? $_POST['password']: '' ?>">
                <br>
                <span class="text-danger fst-italic"><?= isset($errors['password']) ? $errors ['password'] : '' ?></span>
            </div>

            <div class="text-center d-flex flex-column">
                <span class="text-danger fst-italic default-span"><?= isset($errors['connection']) ? $errors['connection'] : '' ?></span>
                <button class="btn btn-primary">Se connecter</button>
            </div>
            </div>
            <div>
                <small> <a href="">mot de passe oubliée</a></small>

            </div>
        </div>




    </form>
</div>



<?php include('templates/footer.php') ?>