document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById('inscription');
    const prenom = document.getElementById('prenom');
    const nom = document.getElementById('nom');
    const email = document.getElementById('email');
    const login = document.getElementById('login');
    const password = document.getElementById('password');
    const password_bis = document.getElementById('password_bis');

    form.addEventListener('submit', function (e) {
        let valid = true;

        if (prenom.value.trim() === "") {
            showError(prenom, "Le prénom est requis");
            valid = false;
        } else {
            showSuccess(prenom);
        }

        if (nom.value.trim() === "") {
            showError(nom, "Le nom est requis");
            valid = false;
        } else {
            showSuccess(nom);
        }

        if (email.value.trim() === "") {
            showError(email, "L'email est requis");
            valid = false;
        } else if (!isValidEmail(email.value)) {
            showError(email, "L'email n'est pas valide");
            valid = false;
        } else {
            showSuccess(email);
        }

        if (login.value.trim() === "") {
            showError(login, "Le login est requis");
            valid = false;
        } else {
            showSuccess(login);
        }

        if (password.value.trim() === "") {
            showError(password, "Le mot de passe est requis");
            valid = false;
        } else {
            showSuccess(password);
        }

        if (password_bis.value.trim() === "") {
            showError(password_bis, "La confirmation du mot de passe est requise");
            valid = false;
        } else if (password.value !== password_bis.value) {
            showError(password_bis, "Les mots de passe ne correspondent pas");
            valid = false;
        } else {
            showSuccess(password_bis);
        }

        if (!valid) {
            e.preventDefault();
        }
    });

    function showError(input, message) {
        const formGroup = input.parentElement;
        formGroup.className = 'form-group error';
        const small = formGroup.querySelector('small');
        small.innerText = message;
    }

    function showSuccess(input) {
        const formGroup = input.parentElement;
        formGroup.className = 'form-group success';
    }

    function isValidEmail(email) {
        const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        return re.test(String(email).toLowerCase());
    }
});