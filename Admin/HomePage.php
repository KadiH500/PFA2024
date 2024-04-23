<?php
require '../styles/includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        /* Simple styles for the admin dashboard */
        button {
            all: unset; /* Remove default button styles */
            box-sizing: border-box; /* Ensure consistent box sizing */
        }
        .dashboard {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .dashboard button {
            padding: 12px 20px; /* Consistent padding */
            font-size: 16px; /* Uniform font size */
            cursor: pointer;
            background-color: #3498db; /* Blue background */
            color: white; /* White text */
            border: none; /* No border */
            border-radius: 5px; /* Rounded corners */
            transition: background-color 0.3s; /* Smooth transition */
        }
        .dashboard button:hover {
            background-color: #2980b9;
        }
        .flower-list {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
        }
        .commande-list {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
<nav class="navbar">
    <div class="container">
      <div>
        <a href="../styles/HomePage.php">
        <img class="logo" src="../imgs/navbarlogo.jpeg" alt=""></a>
      </div>
      </div>
    </div>
  </nav>
    <div class="dashboard">
        <!-- Form to add a flower -->
        <form action="./includes/add_flower.php" method="POST">
            <button type="submit">Add Flower</button>
        </form>

        <!-- Form to delete the last flower -->
        <form action="./includes/delete_flower.php" method="POST">
            <button type="submit">Delete Last Flower</button>
        </form>

        <!-- Button to show flowers, triggers a page reload -->
        <button onclick="window.location.reload();">Show Flowers</button>
    

    <!-- Section to display the list of flowers -->
    <div class="flower-list">
        <?php
        $query = "SELECT * FROM stock ORDER BY id";
        $stmt = $pdo->query($query);

        while ($flower = $stmt->fetch()) {
            echo "<div>{$flower['name']}</div>";
        }
        ?>
    </div>
    <button onclick="window.location.reload();">les commandes:</button>
    <div class="commande-list">
        <?php
        $query2 = "SELECT * FROM commande ";
        $stmt2 = $pdo->query($query2);

        while ($commande = $stmt2->fetch()) {
            echo "<div>la commande: {$commande['id']} de date: {$commande['datetime']}</div>";
        }
        ?>
    </div>
    </div>
</body>
</html>