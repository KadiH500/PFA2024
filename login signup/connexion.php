<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'fleuriste'; // nom database


try {
    $connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    echo "Connexion réussie à la base de données.<br>";
   
} catch (PDOException $e) {

    echo "Erreur : " . $e->getMessage();
}
?>