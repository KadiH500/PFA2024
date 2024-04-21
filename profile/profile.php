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

    $sql = "INSERT INTO users (username, name, email, bio, ville, adresse, codepostal, phone)
    VALUES ('$username', '$name', '$email', '$bio', '$ville', '$adresse', '$codepostal', '$phone')";


}


?>