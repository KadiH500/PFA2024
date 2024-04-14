<?php

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require('connexion.php');

        // Determine which form was submitted based on the form_type value
        if (isset($_POST['signup'])) {


            // Process sign-up form
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role=$_POST['role'];

             // Regex patterns for validation
            $username_pattern = "/^[a-zA-Z0-9_]{3,20}$/"; // Alphanumeric with underscores, 3-20 characters
            $email_pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/"; // Email pattern
            $password_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/"; // Minimum 8 characters, at least one uppercase letter, one lowercase letter, and one number

            // Validate input using regex
            
                $check_query = "SELECT * FROM signup WHERE username='$username' OR email='$email'";
            $result = $conn->query($check_query);
            if ($result->rowCount() > 0) {
                $errorMessage3 = "already exists try again.";
                echo "<script>alert('$errorMessage3');</script>";
            } else {

                // Insert data into the database
                echo"2";
                $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
                $insert_query = "INSERT INTO signup (username , email , password , role)VALUES ('$username', '$email', '$hashed_password' , '$role')";
                $tr=$conn->query($insert_query);
                if ($tr) {
                    header("location: ../styles/HomePage.html");
                } else {
                    echo "Error:";
                }
            }
        
        
        }
        else if (isset($_POST['signin'])) {
            $username = $_POST['user'];
            $password = $_POST['pw'];
            if (empty($username)) {
                header("Location: losi.html?error=User Name is Required");
            }else if (empty($password)) {
                header("Location: losi.html?error=Password is Required");
            }else {
        
                // Hashing the password
                $password = md5($password);
                
                $sql = "SELECT * FROM signup WHERE username='$username' AND password='$password'";
                $result = $conn->query($sql);
                if ($result->rowCount() === 1) {

                        header("location: ../styles/HomePage.html");
                    }else {
                        header("Location: losi.html?error=Incorect User name or password");
                    }
        
            }
            
        }else {
            header("Location: losi.html");
        }



        
    
    }


// Close the database connection
$conn=null;
?>
