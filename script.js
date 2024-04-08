
/* Recuperation du formulaire */
const inscription_form = document.querySelector("#parametres");

/* Selectionner et recuperer les champs du formulaire */
const prenom = document.querySelector("#prenom");
const nom = document.querySelector("#nom");
const email = document.querySelector("#email");
const login = document.querySelector("#login");
const password = document.querySelector("#password");
const password_bis = document.querySelector("#password_bis");

/* Evenements */
inscription_form.addEventListener('submit', e => {
  e.preventDefault(); /* Cette fonction empeche le rechargement du formulaire */
  inscription_form_verifier(); /* Creation d'une fonction pour verifier tous les champs */
});
/* Fonctions */
/* Utilisation de la fonction pour empecher un espace en debut et fin de saisie avec trim() */
function inscription_form_verifier() {
  /* Obtenir toutes les valeurs des champs */
  const prenomValue = prenom.value.trim();
  const nomValue = nom.value.trim();
  const emailValue = email.value.trim();
  const loginValue = login.value.trim();
  const passwordValue = password.value.trim();
  const password_bisValue = password_bis.value.trim();
  //------------------------------------VERIFICATION PRENOM-----------------------------------------------------------------------------------------------
  if (prenomValue === "") {
    let message = "Donner votre prenom";
    setError(prenom, message);//fonction qu'il faut appeler en cas d'erreur

  } else {
    setSuccess(prenom);//fonction qu'il faut appeler en cas de succès de l'EMAIL
  }
  //------------------------------------VERIFICATION NOM-----------------------------------------------------------------------------------------------
  if (nomValue === "") {
    let message = "Donner votre nom";
    setError(nom, message);//fonction qu'il faut appeler en cas d'erreur

  } else {
    setSuccess(nom);//fonction qu'il faut appeler en cas de succès de l'EMAIL
  }
  //------------------------------------VERIFICATION DE L'ADRESSE MAIL-----------------------------------------------------------------------------------------------
  if (emailValue === "") {
    let message = "le champ EMAIL ne doit pas etre vide";
    setError(email, message);//fonction qu'il faut appeler en cas d'erreur

  } else if (!verifierEmail(emailValue)) {
    let message = "Votre EMail n'est pas valable";
    setError(email, message);//fonction qu'il faut appeler en cas d'erreur de email
  } else {
    setSuccess(email);//fonction qu'il faut appeler en cas de succès de l'EMAIL
  }
  //----------------------------------VERIFICATION DU LOGIN---------------------------------------------------------------------------------------------
  // Vérifier si le champ login est vide
  if (loginValue === "") {
    let message = "Le champ login ne doit pas être vide";
    setError(login, message); // fonction qu'il faut appeler en cas d'erreur
  } else {
    // Vérifier que le login commence par une lettres
    if (!loginValue.match(/^[A-Za-z]/)) {
      let message = "Le champ login doit commencer par une lettre";
      setError(login, message); // fonction qu'il faut appeler en cas d'erreur
    } else {
      // Vérifier que le login a au moins 5 caractères
      let letterNum = loginValue.length;
      if (letterNum < 5) {
        let message = "Le champ login doit comporter au moins 5 caractères";
        setError(login, message); // fonction qu'il faut appeler en cas d'erreur
      } else {
        setSuccess(login); // fonction qu'il faut appeler en cas de succès du login
      }
    }
  }
  //-------------------------------------------------VERIFICATION MOT DE PASSE-----------------------------------------------------------------
  if (passwordValue === "") {
    let message = "le champ mot de passe ne doit pas etre vide";
    setError(password, message);//fonction qu'il faut appeler en cas d'erreur mot de passe
  } else if (!verifierMotDePasse(passwordValue)) {
    let message = "Votre mot de passe avec lettres,chiffres,caracteres spéciaux au moins 4 caractères)";
    setError(password, message);//fonction qu'il faut appeler en cas d'erreur mot de passe
  } else {
    setSuccess(password);//fonction qu'il faut appeler en cas de succès mot de passe
  }


  //---------------------------------------------------VERIFICATION MOT DE PASSE DE CONFIRMATION--------------------------------------------------------
  if (password_bisValue === "") {
    let message = "Confirmer mot de passe";
    setError(password_bis, message);//fonction qu'il faut appeler en cas d'erreur mot de passe
  } else if (password_bisValue !== passwordValue) {
    let message = "les deux mots de passe ne correspondent pas";
    setError(password_bis, message);
  } else {
    setSuccess(password_bis);
  }
}
//---------------------------------------------------------------------------------------------------------------------------------------------------------




//-----------------------------Creation d'une fonction verifierEmail() qui vérifie l'adresse mail(1ère etape)------------------------------------

//Creation d'une methode test() qui renvoie un boolean (2ème étape)
//la fonction verifier Email() retourne  l'expression regulière d'une adresse email
//La  methode test() renvoie true or false
//La methode test verifie si la saisie de utilisateur répond à la règle de l'adresse mail defini
//function verifierEmail(email) {
//return /^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/.test(email);}
function verifierEmail(email) {
  return /^[^@]+@[^@]+\.[a-z]{2,4}$/.test(email);
}

//--------------------------Création de fonctions setError()pour             verifier LOGIN INVALIDE----------------------------------------------------------

function setError(elem, message) //fonction qu'il faut appeler en cas d'erreur login invalide(paramètre 'elem' et 'message')
{
  const champ = elem.parentElement;// creation d'une variable 'champ'pour recuperer le parent de l'élément 'elem'
  const small = champ.querySelector('small');//récupération à travers 'champ' de 'small' du message d'erreur pour son affichage
  small.innerText = message;//Ajouter le  message d'erreur indiquannt que le login est invalide
  champ.className = "champ error";//Ajouter la classe error et fin verification champ login (resultat error)
}
//--------------------------Création de fonctions  setSuccess() pour         verifier LOGIN VALIDE------------------------------------------------------------------------------------

function setSuccess(elem) {//fonction qu'il faut appeler en cas de login valide(paramètre 'elem')
  const champ = elem.parentElement; // creation d'une variable 'champ'pour recuperer le parent de l'élément 'elem'
  champ.className = "champ success";//Ajouter la classe success et fin verification champ login(resultat succes)
}



//-----------------------------Creation d'une fonction verifierMotDePasse() qui vérifie le mot de passe(1ère etape)------------------------------------

//Creation d'une methode test() qui renvoie un boolean (2ème étape)
//la fonction verifierMotDePasse() retourne  l'expression regulière d'un mot de passe defini selon le besoin
//La  methode test() renvoie true or false
//La methode test verifie si la saisie de utilisateur répond à la règle du mot de passe defini 
//function verifierMotDePasse(password) {
// return /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,12}$/.test(password);}
function verifierMotDePasse(password) {
  return /^(?=.*[0-9])(?=.*[a-zA-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{4,}$/.test(password);
}
//   regle mot de passe:      /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8, 12}$/   (lettre,chiffre,caracteres speciaux)


