<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
    <style>

        a {
            text-align: center;
            display: block;
            margin-top: 15px;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <form id="form" action="registerdb.php" method="POST">
            <h1>Registration</h1>
            <div class="input-control">
                <label for="username">Username</label>
                <input id="username" name="username" type="text">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="email">Email</label>
                <input id="email" name="email" type="text">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="password">Password</label>
                <input id="password" name="password" type="password">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="password2">Password again</label>
                <input id="password2" name="password2" type="password">
                <div class="error"></div>
            </div>
            <a href="login.php">Already have an account?</a>
            <button type="submit" name="submit">Sign Up</button>
        </form>
    </div>
    <script>
        const form = document.getElementById('form');
        const username = document.getElementById('username');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const password2 = document.getElementById('password2');

        form.addEventListener('submit', e => { // Prevent the form from submitting
            if (validateInputs()) {
                form.submit(); 
            }
        });

        username.addEventListener('input', () => validateUsername());
        email.addEventListener('input', () => validateEmail());
        password.addEventListener('input', () => validatePassword());
        password2.addEventListener('input', () => validatePassword2());

        const setError = (element, message) => {
            const inputControl = element.parentElement;
            const errorDisplay = inputControl.querySelector('.error');
            errorDisplay.innerText = message;
            inputControl.classList.add('error');
            inputControl.classList.remove('success');
        };

        const setSuccess = element => {
            const inputControl = element.parentElement;
            const errorDisplay = inputControl.querySelector('.error');

            errorDisplay.innerText = '';
            inputControl.classList.add('success');
            inputControl.classList.remove('error');
        };

        const isValidEmail = email => {
            const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            return re.test(String(email).toLowerCase());
        };

        const validateInputs = () => {
            const usernameValid = validateUsername();
            const emailValid = validateEmail();
            const passwordValid = validatePassword();
            const password2Valid = validatePassword2();

            return usernameValid && emailValid && passwordValid && password2Valid;
        };

        const validateUsername = () => {
            const usernameValue = username.value.trim();
            const startsWithNumber = /^\d/.test(usernameValue);
            if (usernameValue === '') {
                setError(username, 'Username is required');
                return false;
            } else if (startsWithNumber) {
                setError(username, 'Username cannot start with a number');
                return false;
            } else {
                setSuccess(username);
                return true;
            }
        };

        const validateEmail = () => {
            const emailValue = email.value.trim();
            if (emailValue === '') {
                setError(email, 'Email is required');
                return false;
            } else if (!isValidEmail(emailValue)) {
                setError(email, 'Provide a valid email address');
                return false;
            } else {
                setSuccess(email);
                return true;
            }
        };

        const validatePassword = () => {
            const passwordValue = password.value.trim();
            if (passwordValue === '') {
                setError(password, 'Password is required');
                return false;
            } else if (passwordValue.length < 8) {
                setError(password, 'Password must be at least 8 characters');
                return false;
            } else if (!/[A-Z]/.test(passwordValue)) {
                setError(password, 'Password must contain at least one uppercase letter');
                return false;
            } else if (!/[a-z]/.test(passwordValue)) {
                setError(password, 'Password must contain at least one lowercase letter');
                return false;
            } else if (!/[0-9]/.test(passwordValue)) {
                setError(password, 'Password must contain at least one number');
                return false;
            } else if (!/[!@#\$%\^\&*\)\(+=._-]/.test(passwordValue)) {
                setError(password, 'Password must contain at least one special character');
                return false;
            } else {
                setSuccess(password);
                return true;
            }
        };

        const validatePassword2 = () => {
            const passwordValue = password.value.trim();
            const password2Value = password2.value.trim();
            if (password2Value === '') {
                setError(password2, 'Please confirm your password');
                return false;
            } else if (password2Value !== passwordValue) {
                setError(password2, "Passwords don't match");
                return false;
            } else {
                setSuccess(password2);
                return true;
            }
        };
    </script>
</body>
</html>
