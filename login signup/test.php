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
                    header("Location: ../user/HomePage.php");
                    exit(); // Exit after redirection
                } elseif ($role === 'fleuriste') {
                    header("Location: ../stylesadmin/HomePage.php");
                    exit(); // Exit after redirection
                }
            } else {
                // Invalid credentials
                echo "Invalid username or password.";
            }
    
        }
    }
    else if(isset($_POST["btnsignup"])) {
        // Handle sign-up form submission
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password1']; // Assuming your password field is named 'password1'
        $role = $_POST['role'];

        // Check if the user already exists
        $check_query = "SELECT * FROM signup WHERE username=:username OR email=:email";
        $check_stmt = $conn->prepare($check_query);
        $check_stmt->bindParam(':username', $username);
        $check_stmt->bindParam(':email', $email);
        $check_stmt->execute();
        $row_count = $check_stmt->rowCount();

        if ($row_count === 0) {
            // No user with the same username or email exists, proceed with insertion
            $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password
            $insert_query = "INSERT INTO signup (username, email, password, role) VALUES (:username, :email, :password, :role)";
            $insert_stmt = $conn->prepare($insert_query);
            $insert_stmt->bindParam(':username', $username);
            $insert_stmt->bindParam(':email', $email);
            $insert_stmt->bindParam(':password', $hashed_password);
            $insert_stmt->bindParam(':role', $role);
            $insert_result = $insert_stmt->execute();

            if ($insert_result) {
                // Start a session and set session variables
                session_start();
                $lastInsertId = $conn->lastInsertId();

                $_SESSION['username'] = $username;
                $_SESSION['id'] = $lastInsertId; // Assuming you have an auto-increment ID
                
                // Redirect based on role
                if ($role === 'acheteur') {
                    header("Location: ../user/HomePage.php");
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
    $conn = null;
}
?>
