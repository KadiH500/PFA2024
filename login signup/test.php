<?php

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require('connexion.php');

        // Determine which form was submitted based on the form_type value
        if (isset($_POST['signup'])) {


            // Process sign-up form
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password1'];
            $password=$_POST['password2'];
            $role=$_POST['role'];

           
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
                    if ($role === 'user') {
                        header("Location: ../stylesuser/HomePage.php");
                    } elseif ($role === 'admin') {
                            header("Location: ../stylesadmin/HomePage.php");
                        }
        
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
                    $row = $result->fetch(PDO::FETCH_ASSOC);
                    $role = $row['role']; // Assuming 'role' is the column in your database that stores user roles

                    // Redirect users based on their role
                    if ($role === 'user') {
                    header("Location: ../stylesuser/HomePage.php");
                    } elseif ($role === 'admin') {
                        header("Location: ../stylesadmin/HomePage.php");
                    }
    
                } else {
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
