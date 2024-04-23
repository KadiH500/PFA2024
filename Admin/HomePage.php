<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles/HomePage.css" />
    <title>Admin Dashboard</title>

    <style>
        /* Simple styles for the admin dashboard */
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .dashboard {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .dashboard button {
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .dashboard button:hover {
            background-color: #8888;
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
      <div class="container-nav">
        <div class="box">
          <input type="text" placeholder="Recherche...">
          <a href="#">
 <i class="fas fa-search"></i>
          </a>
        </div>
  
        </div>
        
      </div>
    </div>
  </nav>
    <div class="dashboard">
        <button onclick="addFlower()">Add Flower</button>
        <button onclick="deleteFlower()">Delete Last Flower</button>
        <button onclick="showFlowers()">Show Flowers</button>
    </div>
</body>
</html>