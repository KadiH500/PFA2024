<?php
session_start();
include "connexion.php";
// Check if user is logged in
        if (isset($_SESSION['username']) && isset($_SESSION['id'])) {
            $userId = $_SESSION['id'];

            // Fetch user data from the database
            $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
            $stmt->bindParam(1, $userId);
            $stmt->execute();
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
            $stmt2 = $conn->prepare("SELECT * FROM signup WHERE id = ?");
            $stmt2->bindParam(1, $userId);
            $stmt2->execute();
            $userData2 = $stmt2->fetch(PDO::FETCH_ASSOC);


            if ($userData && $userData2) {
                $username = $userData2['username'];
                $name = $userData['name'];
                $email = $userData2['email'];
                $ville = $userData['ville'];
                $adresse = $userData['adresse'];
                $codepostal = $userData['codepostal'];
                $phone = $userData['phone'];

                // Handle form submission
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitbtn'])) {
                    // Get new values from the form
                    $newUsername = !empty($_POST['username']) ? $_POST['username'] : $username;
                    $newName = !empty($_POST['name']) ? $_POST['name'] : $name;
                    $newEmail = !empty($_POST['email']) ? $_POST['email'] : $email;
                    $newVille = !empty($_POST['ville']) ? $_POST['ville'] : $ville;
                    $newAdresse = !empty($_POST['adresse']) ? $_POST['adresse'] : $adresse;
                    $newCodePostal = !empty($_POST['codepostal']) ? $_POST['codepostal'] : $codepostal;
                    $newPhone = !empty($_POST['phone']) ? $_POST['phone'] : $phone;

                    // Update user data in the database
                    $updateStmt = $conn->prepare("UPDATE users SET  name = ?, ville = ?, adresse = ?, codepostal = ?, phone = ? WHERE id = ?");
                    $updateStmt->execute([ $newName, $newVille, $newAdresse, $newCodePostal, $newPhone, $userId]);
                    $updateStmt2= $conn->prepare("UPDATE signup SET username= ?,email= ? WHERE id =?");
                    $updateStmt2->execute([ $newUsername, $newEmail, $userId]);
                    if ($updateStmt && $updateStmt2) {
                        echo '<script>alert("Updated with success!");</script>';
                        // Redirect to the profile page after updating
                        header("Location: profil1.php");
                        exit();}
                }
                else if(isset( $_POST["pwbtn"])) {
                    if (isset($_POST['password1']) && isset($_POST['password2'])) {
                        $password1 = $_POST['password1'];
                        $password2 = $_POST['password2'];
                        $passwordog = $_POST['ogpassword'];
                        $stmt = $conn->prepare("SELECT password FROM signup WHERE username = ?");
                        $stmt->bindParam(1, $_SESSION['username']);
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $hashedPasswordFromDB = $result['password'];
                
                
                        if (($password1 === $password2) && (password_verify($passwordog, $hashedPasswordFromDB))){
                            // Passwords match, update the password in the database
                            $hashedPassword = password_hash($password1, PASSWORD_DEFAULT);
                            $updateStmt = $conn->prepare("UPDATE signup SET password = ? WHERE id = ?");
                            $updateStmt->bindParam(1, $hashedPassword);
                            $updateStmt->bindParam(2, $userId);
                            $updateStmt->execute();
                            
                            echo '<script>alert("Password updated successfully!");</script>';
                            header("Location: profil1.php");
                        } else if($password1 !== $password2 ) {
                            header("Location: profil1.php");
                            echo '<script>alert("Passwords do not match!");</script>';
                        }
                        else{
                            header("Location: profil1.php");
                            echo '<script>alert("please confirm your password!");</script>';
                            
                        }
                    }
                }
            
        } else {
            header("Location: ../login_signup/losi.php");
            exit();
        }
}
?>