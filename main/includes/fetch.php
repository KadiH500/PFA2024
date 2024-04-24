<?php
try {
    require_once "dbh.inc.php";
    // Fetch data from table
    $stmt = $pdo->query('SELECT * FROM stock ');
    $products = $stmt->fetchAll();
    // Return the data as JSON
    header('Content-Type: application/json');
    echo json_encode($products);
    $stmt=null;
    $pdo=null;
} catch (PDOException $e) {
    die ("failed".$e->getMessage());
}
?>