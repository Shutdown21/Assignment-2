function validateSignup() {
    // Reset error messages and styles
    resetErrors();

    // Get form inputs
    var usernameInput = document.getElementById('username');
    var passwordInput = document.getElementById('password');
    
    var isValid = true;

    // Validate Login
    if (!isNonEmpty(usernameInput.value)) {
        displayError(usernameInput, '❌ Please enter a username');
        isValid = false;
    } else if (usernameInput.value.length > 30){
        displayError(usernameInput, '❌ Login must be less than 30 characters');
        isValid = false;
    }

    // Validate Password
    if (!isNonEmpty(passwordInput.value)) {
        displayError(passwordInput, '❌ Please enter a password');
        isValid = false;
    } else if (passwordInput.value.length < 8) {
        displayError(passwordInput, '❌ Password must be at least 8 characters long');
        isValid = false;
    }

    // Validation successful
    return isValid;
}

function validate2() {
    // Reset error messages and styles
    resetErrors();

    // Get form inputs
    var username2Input = document.getElementById('username2');
    var password2Input = document.getElementById('password2');
    
    var isValid = true;

    // Validate Login
    if (!isNonEmpty(username2Input.value)) {
        displayError(username2Input, '❌ Please enter a username');
        isValid = false;
    }

    // Validate Password
    if (!isNonEmpty(password2Input.value)) {
        displayError(password2Input, '❌ Please enter a password');
        isValid = false;
    }

    // Validation successful
    return isValid;
}

function isNonEmpty(value) {
    return value.trim() !== '';
}

function displayError(input, message) {
    // Display error message below the input
    var errorDiv = document.createElement('div');
    errorDiv.className = 'error-message';
    errorDiv.textContent = message;
    input.parentNode.appendChild(errorDiv);

    input.style.borderColor = 'red';
    input.style.borderWidth = '3px';
}

function resetErrors() {
    // Remove all error messages and reset input styles
    var errorMessages = document.querySelectorAll('.error-message');
    errorMessages.forEach(function (errorMessage) {
        errorMessage.parentNode.removeChild(errorMessage);
    });

    var inputs = document.querySelectorAll('input');
    inputs.forEach(function (input) {
        input.classList.remove('input');
        input.style.borderWidth = '1px';
        input.style.borderColor = '';
    });
}

function displayLoginError(errorMessage) {
    // Display error message
    var loginErrorDiv = document.createElement('div');
    loginErrorDiv.className = 'error-message';
    loginErrorDiv.textContent = '❌ ' + errorMessage;

    // Assuming username2Input is the input for the login form
    var username2Input = document.getElementById('username2');
    username2Input.parentNode.appendChild(loginErrorDiv);
}

document.addEventListener('DOMContentLoaded', function () {
    var form2 = document.getElementById('form2');
    form2.addEventListener('submit', function (event) {
        event.preventDefault();

        // Perform client-side validation
        if (validate2()) {
            // If validation is successful, send an AJAX request to logincheck.php
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../private/logincheck.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        // Successful login, redirect
                        window.location.href = response.redirect;
                    } else {
                        // Display error message
                        displayLoginError(response.error);
                    }
                }
            };

            // Serialize form data
            var formData = new FormData(form2);
            var serializedForm = [];
            formData.forEach(function (value, key) {
                serializedForm.push(key + "=" + encodeURIComponent(value));
            });
            var requestBody = serializedForm.join("&");

            // Send the AJAX request
            xhr.send(requestBody);
        }
    });
});
