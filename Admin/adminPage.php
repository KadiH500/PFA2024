<?php
require '../main/includes/dbh.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./admin.css"/>
    <title>Admin Dashboard</title>
</head>
<body>
<nav class="navbar">
    <div class="container">
      <div>
        <a href="admin/HomePage.php">
        <img class="logo" src="../imgs/navbarlogo.jpeg" alt=""></a>
      </div>
      </div>
    </div>
  </nav>
    <div class="dashboard">
        <!-- Form to add a flower -->
        <form action="./includes/add_flower.php" method="POST">
            <label for="nom">Nom Flower: </label>
            <input type="text" name="nom" id="nom"></input></br>
            <label for="qte">qte: </label>
            <input type="text" name="qte" id="qte"></input></br>
            <label for="cat">Cat Flower: </label>
            <input type="text" name="cat" id="cat"></input></br>
            <label for="prix">Prix Flower: </label>
            <input type="text" name="prix" id="prix"></input></br>
            <button type="submit">Ajouter Fleur</button>
        </form>

        <!-- Form to delete the last flower -->
        <form action="./includes/delete_flower.php" method="POST">
</br>
            <button type="submit">Supprimer la dernière Fleur</button>
        </form>

        <!-- Button to show flowers, triggers a page reload -->
        
        </br>
        <button onclick="window.location.reload();">Mise A Jour Fleurs</button>
    

    <!-- Section to display the list of flowers -->
    <div class="flower-list">
        <?php
        $query = "SELECT * FROM stock ORDER BY id";
        $stmt = $pdo->query($query);

        while ($flower = $stmt->fetch()) {
            echo "<div>Id: {$flower['id']} | Nom: {$flower['name']} | Qte: {$flower['qte']} | Prix: {$flower['price']}Dt </div>";
        }
        ?>
    </div>
    
    </br>
    <button onclick="window.location.reload();">Mise A Jour Commandes</button>
    <div class="commande-list">
        <?php
        $query2 = "SELECT * FROM commande ";
        $stmt2 = $pdo->query($query2);

        while ($commande = $stmt2->fetch()) {
            echo "<div>la Commande: {$commande['id']} De Date: {$commande['datetime']}</div>";
        }
        ?>
    </div>
    <button ><a href="logout.php">Log out</a></button>
    </div>
</body>
</html>