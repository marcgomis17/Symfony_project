import '../bootstrap/js/dist/toast';

const form = document.querySelector('#login-form');
const emailField = document.querySelector('input[name=login]');
const passwordField = document.querySelector('input[name=password]');
const toast = document.getElementById('toast');
const toastMessage = toast.querySelector('.toast-body');


if (toastMessage.innerText != "") {
    console.log(toastMessage.innerText);
}

function setString(field) {
    var fieldName = field.name;
    return fieldName.substring(0, 1).toUpperCase() + fieldName.substring(1, fieldName.length);
}

function showError(field, errorMsg) {
    var errorDisplay = field.parentElement.querySelector('small');
    errorDisplay.innerText = errorMsg;
    field.classList.add('is-invalid');
    console.log(field);
    errorDisplay.style.visibility = "visible";
}

function checkValues(field) {
    if (field.value == "") {
        return setString(field) + " obligatoire";
    } else {
        if (field.name == "email") {
            const re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            if (field.value.match(re)) {
                return "";
            } else {
                return setString(emailField) + " invalide";
            }
        }
        return ""
    }
}

form.addEventListener('submit', (e) => {
    var emailError = checkValues(emailField);
    if (emailError != "") {
        e.preventDefault();
        showError(emailField, emailError);
    }

    var passwordError = checkValues(passwordField);
    if (passwordError != "") {
        e.preventDefault();
        showError(passwordField, passwordError);
    }
})