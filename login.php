<?php session_start();?>
<?php 
require_once './includes/header.php'; 
?>
<?php if (isset($_SESSION['flash'])):  ?>
<?php foreach ($_SESSION['flash'] as $type => $message): ?>
<div class="container col-md-8 col-md-offset-2">
    <div class="alert alert-<?= $type ?>">
        <?= $message ?>
    </div>
</div>
<?php endforeach;?>
<?php unset($_SESSION['flash']) ?>
<?php endif;?>

<link rel="stylesheet" href="./fontawesome/css/all.min.css">
<link rel="shortcut icon" href="./assets/logopers1.png" type="image/png">
<link rel="stylesheet" href="./assets/logimage.png" type="image/png">
<link rel="stylesheet" href="./css/login.css">
<main>
    <div class="container col-md-8 col-md-offset-2" id="parametres" style="margin-top: 2cm;">
        <div class="title">
            <h1>SE CONNECTER</h1>
        </div>

        <div class="col-md-8 col-md-offset-2">
            <div class="hero-overview">
                <img src="./assets/background.png" height="370" width="399" alt="image">
            </div>
        </div>
        <!-- ========================================================================================== -->
        <form action="traiteConnexion.php" method="POST" class="form" id="connexion">
            <fieldset>

                <div class="champ">
                    <label for="username">EMAIL/LOGIN</label>
                    <input type="username" id="username" class="form-control" name="username">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation"></i>
                    <small>Message d'erreur</small>
                </div>
                <div class="champ">
                    <label for="password">MOT DE PASSE</label>
                    <input type="password" id="password" class="form-control" name="password">
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation"></i>
                    <small>Message d'erreur</small>
                </div>
                <label for="remember-me" class="champ">
                    <input type="checkbox" id="remember-me">
                    <i class="fas fa-check-square"></i> Se souvenir de moi
                </label>
                <div class="validation_inscription">
                    <button type="submit" class="btn btn-primary" name="envoyer"><i class="fas fa-user-plus"></i>
                        SE CONNECTER
                    </button>
                </div>
            </fieldset>
        </form>

    </div>
</main>

<?php 
require_once './includes/footer.php'; 
?>