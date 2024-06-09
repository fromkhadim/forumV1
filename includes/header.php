const form = document.querySelector("#form");

form.addEventListener('submit', e => {
e.preventDefault();
formVerifier();
});

function formVerifier() {
const prenom = document.querySelector("#prenom");
const prenomValue = prenom.value.trim();
const prenomError = document.querySelector("#prenomError");

if (prenomValue === "") {
setError(prenomError, "Le prénom est requis");
} else {
setSuccess(prenomError);
}

// Validez les autres champs du formulaire de la même manière
}

function setError(elem, message) {
elem.innerText = message;
elem.style.display = "block";
}

function setSuccess(elem) {
elem.style.display = "none";
}