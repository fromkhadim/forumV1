<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORUMCHAT</title>
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./css/inscription.css">
    <link rel="shortcut icon" href="./assets/logopers1.png" type="image/png">
    <style>
        .navbar-brand {
            position: relative;
            margin-left: 1260px;
            top: 02px;
            font-size: 14px;
            /* Vous pouvez ajuster cette valeur selon vos besoins */
        }
    </style>
</head>

<body>
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
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">Forum</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">A propos</a></li>
                    <li><a href="#">Regles du Forum</a></li>

                </ul>

                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">S'inscrire<span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Se connecter</a></li>
                    <!--<a class="navbar-brand" href="#">Compte</a> <i class="fas fa-address-card"></i>-->
                    <i class="fas fa-user"></i>
                </ul>

            </div>
        </div>

    </nav>

</body>