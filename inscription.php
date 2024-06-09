<?php session_start();
include_once './includes/header.html';
?>
<head>
    <link rel="stylesheet" href="./fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./css/inscription.css">

</head>

<main>
    <div class="container col-md-8 col-md-offset-2" id="parametres">
        <div class="inscription_title">
            <h1>INSCRIPTION</h1>
        </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="hero-overview_image">
                <img src="./assets/background.png" height="370" width="399" alt="image">
            </div>
            <!-- ========================================================================================== -->
            <form action="./traiteInscription.php" class="form" method="POST" id="form">
                <fieldset>
                    <div class="form-group">
                        <label for="prenom">PRENOM</label>
                        <input type="text" id="prenom" class="form-control" name="prenom">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation"></i>
                        <small>Message d'erreur</small>
                    </div>
                    <div class="form-group">
                        <label for="nom">NOM</label>
                        <input type="text" id="nom" class="form-control" name="nom">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation"></i>
                        <small> Message d'erreur</small>
                    </div>
                    <div class="form-group">
                        <label for="email">EMAIL</label>
                        <input type="email" id="email" class="form-control" name="email">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation"></i>
                        <small>Message d'erreur</small>
                    </div>
                    <div class="form-group">
                        <label for="login">LOGIN</label>
                        <input type="text" id="login" class="form-control" name="login">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation"></i>
                        <small>Message d'erreur</small>
                    </div>
                    <div class="form-group">
                        <label for="password">MOT DE PASSE</label>
                        <input type="password" id="password" class="form-control" name="password">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation"></i>
                        <small>Message d'erreur</small>
                    </div>
                    <div class="form-group">
                        <label for="password_bis"> CONFIRMATION MOT DE PASSE</label>
                        <input type="password" id="password_bis" class="form-control" name="password_bis">
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation"></i>
                        <small>Message d'erreur</small>
                    </div>
                    <div class="validation_inscription">
                        <button type="submit" class="btn btn-primary" name="envoyer"><i class="fas fa-user-plus"></i>
                            S'INSCRIRE
                        </button>
                    </div>
                </fieldset>
            </form>
            <div class="Els">
                <p>Déjà un compte? <a href="login.php"> Se connecter</a></p>
            </div>
        </div>
    </div>
</main>
<!-- ========================================================================================== -->
<!-- Inclusion du pied de page dans mon fichier inscription.HTML -->
<?php 
  require_once './includes/footer.php'; 
  ?>
<!-- ========================================================================================== -->
<script>
    // Récupération du formulaire
    const form = document.querySelector("#form");

    // Sélectionner et récupérer les champs du formulaire
    const prenom = document.querySelector("#prenom");
    const nom = document.querySelector("#nom");
    const email = document.querySelector("#email");
    const login = document.querySelector("#login");
    const password = document.querySelector("#password");
    const password_bis = document.querySelector("#password_bis");

    // Événement de soumission du formulaire
    form.addEventListener('submit', function(event) {
        // Empêcher le rechargement de la page
        event.preventDefault();

        // Appel de la fonction pour vérifier tous les champs
        formVerifier();
    });

    // Fonction de vérification des champs du formulaire
    function formVerifier() {
        // Obtention de toutes les valeurs des champs
        const prenomValue = prenom.value.trim();
       
        const nomValue = nom.value.trim();
        const emailValue = email.value.trim();
        const loginValue = login.value.trim();
        const passwordValue = password.value.trim();
        const password_bisValue = password_bis.value.trim();

        // Vérification des champs...
        // Vérification du champ prénom
        if (prenomValue === "") {
            setError(prenom, "Prénom requis");
        } else if (!/^[A-Za-z]/.test(prenomValue)) {
            setError(prenom, "Le prénom doit commencer par une lettre");
        } else {
            setSuccess(prenom);
        }

        // Vérification du champ nom
        if (nomValue === "") {
            setError(nom, "Nom requis");
        } else if (!/^[A-Za-z]/.test(nomValue)) {
            setError(nom, "Le nom doit commencer par une lettre");
        } else {
            setSuccess(nom);
        }

        // Vérification du champ email
        if (emailValue === "") {
            setError(email, "Email requis");
        } else if (!verifierEmail(emailValue)) {
            setError(email, "Adresse email non valide");
        } else {
            setSuccess(email);
        }

        // Vérification du champ login
        if (loginValue === "") {
            setError(login, "Login requis");
        } else if (!loginValue.match(/^[A-Za-z]/)) {
            setError(login, "Le login doit commencer par une lettre");
        } else if (loginValue.length < 5) {
            setError(login, "Le login doit comporter au moins 5 caractères");
        } else {
            setSuccess(login);
        }

        // Vérification du champ mot de passe
        if (passwordValue === "") {
            setError(password, "Mot de passe requis");
        } else if (!verifierMotDePasse(passwordValue)) {
            setError(password, "Votre mot de passe doit contenir au moins 8 caractères incluant des lettres, chiffres et caractères spéciaux");
        } else {
            setSuccess(password);
        }

        // Vérification du champ de confirmation de mot de passe
        if (password_bisValue === "") {
            setError(password_bis, "Confirmation de mot de passe requis");
        } else if (password_bisValue !== passwordValue) {
            setError(password_bis, "Les mots de passe ne correspondent pas");
        } else {
            setSuccess(password_bis);
        }

        // Si tous les champs sont valides, envoyer le formulaire
        if (!document.querySelectorAll('.error').length) {
            form.submit();
        }
    }

    // Fonction pour vérifier l'adresse email
    function verifierEmail(email) {
        return /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-zA-Z]{2,4}$/.test(email);
    }

    // Fonction pour définir une erreur
    function setError(elem, message) {
        const champ = elem.parentElement;
        const small = champ.querySelector('small');
        small.innerText = message;
        champ.className = "champ error";
    }

    // Fonction pour définir un succès
    function setSuccess(elem) {
        const champ = elem.parentElement;
        champ.className = "champ success";
    }

    // Fonction pour vérifier le mot de passe
    function verifierMotDePasse(password) {
        return /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,12}$/.test(password);
        // Tout caractère suivi de chiffre suivi de caractères spéciaux entre 8 et 12 caractères
    }
</script>
