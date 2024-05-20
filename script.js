/* Récupération du formulaire */
const form = document.querySelector("#form");

/* Sélectionner et récupérer les champs du formulaire */
const prenom = document.querySelector("#prenom");
const nom = document.querySelector("#nom");
const email = document.querySelector("#email");
const login = document.querySelector("#login");
const password = document.querySelector("#password");
const password_bis = document.querySelector("#password_bis");

/* Événement de soumission du formulaire */
form.addEventListener('submit', e => {
    /* Cette fonction empêche le rechargement du formulaire */
    e.preventDefault();
    formVerifier(); /* Appel de la fonction pour vérifier tous les champs */
});

/* Fonction de vérification des champs du formulaire */
function formVerifier() {
    /* Obtention de toutes les valeurs des champs */
    const prenomValue = prenom.value.trim();
    const nomValue = nom.value.trim();
    const emailValue = email.value.trim();
    const loginValue = login.value.trim();
    const passwordValue = password.value.trim();
    const password_bisValue = password_bis.value.trim();

    // Vérification du champ prénom
    if (prenomValue === "") {
        let message = "Prénom requis";
        setError(prenom, message);
         } else if (!/^[A-Za-z]/.test(prenomValue)) {
            let message = "Le prenom doit commencer par une lettre";
            setError(prenom, message); 
    } else {
        setSuccess(prenom);
    }

    // Vérification du champ nom
    if (nomValue === "") {
        let message = "Nom requis";
        setError(nom, message);
        } else if (!/^[A-Za-z]/.test(nomValue)) {
            let message = "Le nom doit commencer par une lettre";
            setError(nom, message);
    } else {
        setSuccess(nom);
    }

    // Vérification du champ email
    if (emailValue === "") {
        let message = "Email requis";
        setError(email, message);
    } else if (!verifierEmail(emailValue)) {
        let message = "Adresse email non valide";
        setError(email, message);
    } else {
        setSuccess(email);
    }

    // Vérification du champ login
    if (loginValue === "") {
        let message = "Login requis";
        setError(login, message);
    } else if (!loginValue.match(/^[A-Za-z]/)) {
        let message = "Le login doit commencer par une lettre";
        setError(login, message);
    } else if(loginValue.length < 5) {
        let message = "Le login doit comporter au moins 5 caractères";
        setError(login, message);
    } else {
        setSuccess(login);
    }

    // Vérification du champ mot de passe
    if (passwordValue === "") {
        let message = "Mot de passe requis";
        setError(password, message);
    } else if (!verifierMotDePasse(passwordValue)) {
        let message = "Votre mot de passe doit contenir au moins 8 caractères incluant des lettres, chiffres et caractères spéciaux";
        setError(password, message);
    } else {
        setSuccess(password);
    }

    // Vérification du champ de confirmation de mot de passe
    if (password_bisValue === "") {
        let message = "Confirmation de mot de passe requis";
        setError(password_bis, message);
    } else if (password_bisValue !== passwordValue) {
        let message = "Les mots de passe ne correspondent pas";
        setError(password_bis, message);
    } else {
        setSuccess(password_bis);
    }
}
/*======================================================Fonction qui gère l'email================= =================================================*/ 

/* Fonction pour vérifier l'adresse email */
function verifierEmail(email) {
    return /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-zA-Z]{2,4}$/.test(email);
} 
/*======================================================Fonction qui gère le login======================================================================*/ 

/* En cas d'erreur */
function setError(elem, message) {
    const champ = elem.parentElement;
    const small = champ.querySelector('small');
    small.innerText = message;
    champ.className = "champ error";
}
/*En cas de succès*/
function setSuccess(elem) {
    const champ = elem.parentElement;
    champ.className = "champ success";
 }
/*======================================================Fonction qui gère le mot de passe================= =================================================*/
function verifierMotDePasse(password) {
    return /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,12}$/.test(password);
    /*tout caractere //suivi de chiffre //suivi de caracteres speciaux //entre 8et 12 caracteres*/
    
    /*   Abcdefg1!
         Password123@
         !@12aBcD        */
}

 











/*=====================================================================================================================================================*/ 
