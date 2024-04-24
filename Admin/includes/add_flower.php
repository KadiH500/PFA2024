<?php
require_once "../../main/includes/dbh.inc.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add a new flower (using a simple form with a prompt)
    $nom= $_POST['nom'];
    $qte= $_POST['qte'];
    $cat= $_POST['cat'];
    $prix= $_POST['prix'];
        $stmt = $pdo->prepare("INSERT INTO `stock`(`name`, `cat`, `qte`, `price`) VALUES ('$nom','$cat','$qte','$prix')");
        $stmt->execute();
}

// Redirect back to the dashboard
header("Location: ../adminPage.php");
?>