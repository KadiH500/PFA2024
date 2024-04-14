<?php
require('connexion.php');

// Check if the form is submitted for sign-up
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Regex patterns for validation
    $username_pattern = "/^[a-zA-Z0-9_]{3,20}$/"; // Alphanumeric with underscores, 3-20 characters
    $email_pattern = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/"; // Email pattern
    $password_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/"; // Minimum 8 characters, at least one uppercase letter, one lowercase letter, and one number

    // Validate input using regex
    if (!preg_match($username_pattern, $username)) {
        $errorMessage = "Please enter a valid username.";
    echo "<script>alert('$errorMessage');</script>";
    } elseif (!preg_match($email_pattern, $email)) {
        $errorMessage1 = "Please enter a valid email.";
        echo "<script>alert('$errorMessage1');</script>";
    } elseif (!preg_match($password_pattern, $password)) {
        $errorMessage2 = "Please enter a valid password.";
        echo "<script>alert('$errorMessage2');</script>";
    } else {
        // Sanitize inputs to prevent SQL injection
        $username = mysqli_real_escape_string($conn, $username);
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);

        // Check if username or email already exists in the database
        $check_query = "SELECT * FROM signup WHERE username='$username' OR email='$email'";
        $result = $conn->query($check_query);
        if ($result->num_rows > 0) {
            $errorMessage3 = "already exists try again.";
            echo "<script>alert('$errorMessage3');</script>";
        } else {
            // Insert data into the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
            $insert_query = "INSERT INTO signup (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
            if ($conn->query($insert_query) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $insert_query . "<br>" . $conn->error;
            }
        }
    }
}

// Close the database connection
$conn->close();
?>
