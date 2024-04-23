<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require('connexion.php'); // Include or require your database connection file

    if (isset($_POST['btnsignin'])) {
        if (isset($_POST['user']) && isset($_POST['pw'])) {
            $username = $_POST['user'];
            $password = $_POST['pw'];
    
            // Fetch hashed password from the database
            $stmt = $conn->prepare("SELECT password, role FROM signup WHERE username = ?");
            $stmt->bindParam(1, $username);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashedPasswordFromDB = $result['password'];
            $role = $result['role']; // Fetch role from the database
    
            if ($hashedPasswordFromDB && password_verify($password, $hashedPasswordFromDB)) {
                // Passwords match, start a session and set session variables
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $conn->lastInsertId(); // Assuming you have an auto-increment ID
                
                // Redirect based on role
                if ($role === 'acheteur') {
                    header("Location: ../stylesuser/HomePage.php");
                    exit(); // Exit after redirection
                } elseif ($role === 'fleuriste') {
                    header("Location: ../stylesadmin/HomePage.php");
                    exit(); // Exit after redirection
                }
            } else {
                // Invalid credentials
                echo "Invalid username or password.";
            }
    
            $stmt->closeCursor(); // Close the cursor
        }
    }
    } elseif (isset($_POST["btnsignup"])) {
        // Handle sign-up form submission
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password1']; // Assuming your password field is named 'password1'
        $role = $_POST['role'];

        // Check if the user already exists
        $check_query = "SELECT * FROM signup WHERE username='$username' OR email='$email'";
        $result = $conn->query($check_query);
        $row_count = $result->rowCount();

        if ($row_count === 0) {
            // No user with the same username or email exists, proceed with insertion
            $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
            $insert_query = "INSERT INTO signup (username, email, password, role) VALUES ('$username', '$email', '$hashed_password', '$role')";
            $insert_result = $conn->query($insert_query);
            if ($insert_result) {
                // Start a session and set session variables
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $conn->lastInsertId(); // Assuming you have an auto-increment ID
                
                // Redirect based on role
                if ($role === 'acheteur') {
                    header("Location: ../stylesuser/HomePage.php");
                    exit(); // Exit after redirection
                } elseif ($role === 'fleuriste') {
                    header("Location: ../stylesadmin/HomePage.php");
                    exit(); // Exit after redirection
                }
            } else {
                // Error occurred during insertion
                echo "Error occurred during registration.";
            }
        } else {
            // User with the same username or email already exists
            echo "User already exists. Please try again.";
        }
    }

?>
