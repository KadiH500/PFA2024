<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require('connexion.php');

    $username = $_POST['username'] ?? '';
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $bio = $_POST['bio'] ?? '';
    $ville = $_POST['ville'] ?? '';
    $adresse = $_POST['adresse'] ?? '';
    $codepostal = $_POST['codepostal'] ?? '';
    $phone = $_POST['phone'] ?? '';
    if (isset($_POST['edituser'])) {


    }
    else if (isset($_POST['editpassword'])) {



    }
    else if (isset($_POST['editinfo'])) {
        
        
        
        
    }$sql = "INSERT INTO users (username, name, email, bio, ville, adresse, codepostal, phone)
    VALUES ('$username', '$name', '$email', '$bio', '$ville', '$adresse', '$codepostal', '$phone')";


}


?>