<?php
require_once "../../main/includes/dbh.inc.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->query("SELECT MAX(id) AS last_id FROM stock");
    $last_id = $stmt->fetch()['last_id'];
    if ($last_id) {
        $stmt = $pdo->prepare("DELETE FROM stock WHERE id = :id");
        $stmt->execute([':id' => $last_id]);

        echo "Last flower deleted successfully.\n";
    } else {
        echo "No more flowers to delete.\n";
    }
}

// Redirect back to the dashboard
header("Location: ../adminPage.php");
?>
?>