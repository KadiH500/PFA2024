<?php
require_once "../../main/includes/dbh.inc.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Add a new flower (using a simple form with a prompt)
    $flower_name = "test";
    if ($flower_name) {
        $stmt = $pdo->prepare("INSERT INTO stock (name) VALUES (:name)");
        $stmt->execute([':name' => $flower_name]);

        echo "Flower '{$flower_name}' added successfully.\n";
    } else {
        echo "Flower name is required.\n";
    }
}

// Redirect back to the dashboard
header("Location: ../adminPage.php");
?>