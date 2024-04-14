<?php

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require('connexion.php');

        // Determine which form was submitted based on the form_type value
        if (isset($_POST['signup'])) {
            echo"mimimimiiimimi";

            // Process sign-up form
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $check_query = "SELECT * FROM signup WHERE username='$username' OR email='$email'";
            $result = $conn->query($check_query);
            if ($result->rowCount() > 0) {
                $errorMessage3 = "already exists try again.";
                echo "<script>alert('$errorMessage3');</script>";
            } else {
                // Insert data into the database
                echo"2";
                $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
                $insert_query = "INSERT INTO signup VALUES ('$username', '$email', '$hashed_password')";
                $tr=$conn->query($insert_query);
                if ($tr) {
                    echo "New record created successfully";
                } else {
                    echo "Error:";
                }
            }
            // Your sign-up processing code here
        } elseif ($_POST['form_type'] == 'login') {
            // Process login form
            $login_username = $_POST['login_username'];
            $login_password = $_POST['login_password'];

            // Your login processing code here
        }
    } else {
        echo "Error: Form type not specified";
    }


// Close the database connection
$conn=null;
?>
