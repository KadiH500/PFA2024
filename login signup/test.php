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

             // Regex patterns for validation
            $username_pattern = "/^[a-zA-Z0-9_]{3,20}$/"; // Alphanumeric with underscores, 3-20 characters
            $email_pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/"; // Email pattern
            $password_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/"; // Minimum 8 characters, at least one uppercase letter, one lowercase letter, and one number

            // Validate input using regex
            if (!preg_match($username_pattern, $username)) {
                echo "Invalid username format";
    }       
            elseif (!preg_match($email_pattern, $email)) {
                echo "Invalid email format";
    } 
            elseif (!preg_match($password_pattern, $password)) {
                echo "Invalid password format";
    } 
            else {
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
        
        
        }
    }
}

// Close the database connection
$conn=null;
?>
