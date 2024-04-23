<?php
$dsn="mysql:host=localhost;dbname=flowers";
$dbusername="root";
$dbpassword="";

try {
  /* $idcon=mysqli_connect("localhost","root","","flowers");*/
  $pdo=new PDO($dsn,$dbusername,$dbpassword);
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "connection failed: ".$e->getMessage();
}
