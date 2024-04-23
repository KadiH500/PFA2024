<?php 
   session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
    <link rel="shortcut icon" type="x-icon" href="../imgs/logo Icon.png">
</head>
<body>
    <form id="container" method="post" class="container" action="test.php" >
        <!-- FORM SECTION -->
        <div class="row">
            <!-- SIGN UP -->
            <div class="col align-items-center flex-col sign-up">
                <div class="form-wrapper align-items-center">
                    <div class="form sign-up">
                        <div class="input-group">
                            <i class='bx bxs-user'></i>
                            <input type="hidden" name="action" id="action" value="signup">

                            <input type="text" placeholder="Nom d'utilisateur" name="username" id="username">
                            <span id="usernameError" class="error"></span>
                        </div>
                        <div class="input-group">
                            <i class='bx bx-mail-send'></i>
                            <input type="email" placeholder="Email" name="email" id="email">
                            <span id="emailError" class="error"></span>
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input type="password" placeholder="Mot de passe" name="password1" id="password1">
                            <span id="passwordError" class="error"></span>
                        </div>
                        <div class="input-group">
                            <i class='bx bxs-lock-alt'></i>
                            <input type="password" placeholder="Confirmez votre Mot de passe" name="password2" id="password2">
                            <span id="confirmPasswordError" class="error"></span>
                        </div>
                        <select name="role">
                            <option selected value="acheteur">acheteur</option>
                            <option value="fleuriste">fleuriste</option>
                        </select>
                        <br>
                        <br>
                        <button type="submit" onclick=" return validateForm()" name="btnsignup">Valider</button>

                        <p>
                            <span>
                            Vous avez un compte déjà?
                            </span>
                            <b onclick="toggle()" class="pointer">
                                Connectez-vous
                            </b>
                        </p>
                    </div>
                </div>
            </div>
            <!-- END SIGN UP -->
            <!-- SIGN IN -->
<div class="col align-items-center flex-col sign-in">
    <div class="form-wrapper align-items-center">
        <div class="form sign-in">
            <div class="input-group">
                <i class='bx bxs-user'></i>
                <input type="hidden" name="action" id="action" value="signin">

                <input type="text" placeholder="Nom d'utilisateur" name="user" id="user">
            </div>
            <div class="input-group">
                <i class='bx bxs-lock-alt'></i>
                <input type="password" placeholder="Mot de passe" name="pw" id="pw">
            </div>
            <button type="submit" onclick="validatesignin()" name="btnsignin">Valider</button>


            <p>
                <b>
                    Mot de passe oublié ? Pas de panique!
                </b>
            </p>
            <p>
                <span>
                    Vous êtes nouveau par ici?
                </span>
                <b onclick="toggle()" class="pointer">
                    Créez votre compte
                </b>
            </p>
        </div>
    </div>
    <div class="form-wrapper">
    </div>
</div>
<!-- END SIGN IN -->

        </div>
        <!-- END FORM SECTION -->
        <!-- CONTENT SECTION -->
        <div class="row content-row">
            <!-- SIGN IN CONTENT -->
            <div class="col align-items-center flex-col">
                <div class="text sign-in">
                    <h2>
                        Ravis de vous revoir!
                    </h2>
    
                </div>
                
            </div>
            <!-- END SIGN IN CONTENT -->
            <!-- SIGN UP CONTENT -->
            <div class="col align-items-center flex-col">
                <div class="img sign-up">
                
                </div>
                <div class="text sign-up">
                    <h2>
                        Joignez nous
                    </h2>
    
                </div>
            </div>
            <!-- END SIGN UP CONTENT -->
        </div>
        <!-- END CONTENT SECTION -->
    </form>
    <script>
        let container = document.getElementById('container')

        toggle = () => {
            container.classList.toggle('sign-in')
            container.classList.toggle('sign-up')
        }

        setTimeout(() => {
            container.classList.add('sign-in')
        }, 200)

		function validatesignin(){
			let user = document.getElementById('user').value.trim();
			let pw = document.getElementById('pw').value.trim();
			let isValid = true;

            // Validate username
            if (user === '' || pw === '') {
                alert('Please fill in all fields');
                return false; // Prevent form submission
            }


		}

        function validateForm() {
            let username = document.getElementById('username').value.trim();
            let email = document.getElementById('email').value.trim();
            let password1 = document.getElementById('password1').value.trim();
            let password2 = document.getElementById('password2').value.trim();
			
            let usernameRegex = /^[a-zA-Z0-9_]{3,20}$/;
            let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            let passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;

            let isValid = true;

            // Validate username
            if (!usernameRegex.test(username)) {
                document.getElementById('usernameError').innerText = "Nom d'utilisateur invalide.";
                isValid = false;
            } else {
                document.getElementById('usernameError').innerText = "";
            }

            // Validate email
            if (!emailRegex.test(email)) {
                document.getElementById('emailError').innerText = "Email invalide.";
                isValid = false;
            } else {
                document.getElementById('emailError').innerText = "";
            }

            // Validate password
            if (!passwordRegex.test(password1)) {
                document.getElementById('passwordError').innerText = "Mot de passe invalide.";
                isValid = false;
            } else {
                document.getElementById('passwordError').innerText = "";
            }

            // Validate confirm password
            if (password1 !== password2) {
                document.getElementById('confirmPasswordError').innerText = "Les mots de passe ne correspondent pas.";
                isValid = false;
            } else {
                document.getElementById('confirmPasswordError').innerText = "";
            }

            return isValid;
        }

    </script>
</body>
</html>
