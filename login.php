<?php session_start();
include_once './includes/header.html';
?>

<!-- ===================================================Traitement message flash=============================================================== -->
<?php if (isset($_SESSION['flash'])):  ?>
<?php foreach ($_SESSION['flash'] as $type => $message): ?>
<div class="col-md-8 col-md-offset-2">

    <div class="alert alert-<?= $type ?>">
        <?= $message ?>

    </div>
</div>

<?php endforeach;?>

<?php unset($_SESSION['flash']) ?>
<?php endif;?>
<!-- =================================================================================================================================== -->
<!DOCTYPE html>
<!-- saved from url=(0040)http://localhost/perso/forumV1/login.php -->
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORUMCHAT</title>
</head>

<body>
    <!-- ==========================++++++++====================BARRE DE NAVIGATION======================================================== -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <!-- Menu de la barre de navigation-->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <form class="navbar-form navbar-left">

                    <!-- Mettre le bloc RECHERCHER A DOITE OU GAUCHE-->
                    <button type="submit" class="btn btn-default">Rechercher</button>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Recherche">
                    </div>

                </form>


                <ul class="nav navbar-nav">
                    <li><a href="index.html">Accueil</a></li>
                    <li><a href="./Forum.php">Forum</a></li>
                    <li><a href="./Faq.php">FAQ</a></li>
                    <li><a href="./contact.php">Contact</a></li>
                    <li><a href="./A propos.php">A propos</a></li>
                    <li><a href="./Regles du forum.php">Regles du Forum</a></li>

                </ul>

                <ul class="nav navbar-nav">
                    <li class="active"><a href="./inscription.php">S'inscrire<span class="sr-only">(current)</span></a>
                    </li>
                    <li><a href="./login.php">Se connecter</a></li>
                    <!--<a class="navbar-brand" href="#">Compte</a> <i class="fas fa-address-card"></i>-->
                    <i class="fas fa-user"></i>
                </ul>

            </div>
        </div>

    </nav>
    <!-- ============================================================LIENS DE PAGES======================================================== -->

    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">

    <!-- =================================================FORMULAIRE DE CONNECTION================================================= -->
    <main>
        <div class="container col-md-8 col-md-offset-2" id="parametres" style="margin-top: 2cm;">
            <div class="title">
                <h1>SE CONNECTER</h1>
            </div>

            <div class="col-md-8 col-md-offset-2">
                <div class="hero-overview_image">
                    <img src="./assets/background.png" height="370" width="399" alt="">
                </div>
            </div>
            <!-- DEBUT DU FORMULAIRE DE CONNECTION-->
            <form action="traiteConexion.php" method="POST" class="form" id="connexion">
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
            <!-- FIN DU FORMULAIRE DE CONNECTION-->
        </div>
    </main>
    <!-- =====================================================PIED DE PAGE =================================================================== -->
    
    <!-- ============================================LIENS du pied de pages============================================== -->
    <link rel="stylesheet" href="./login_files/login.php">
    <link rel="shortcut icon" href="http://localhost/perso/forumV1/assets/logopers1.png" type="image/png">





</body>

</html>