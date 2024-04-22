<?php
try {
    $id=0;
    require_once "dbh.inc.php";
    $query="select id,qte from stock";
    $stmt=$pdo->prepare($query);
    //$stmt->bindParam(":id",$id);
    $stmt->execute();
    $res=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt=null;
    $pdo=null;
} catch (PDOException $e) {
    die ("failed".$e->getMessage());
}
?>