<?php
    require_once('./connection.php');
    $pdo = getPdo();
$userId = $_SESSION['id'];
$result2 = $pdo->query("SELECT * FROM NewTable WHERE id = '$userId'");
    while($row2 = $result2->fetch(PDO::FETCH_ASSOC))
    {

        $fname = $row2['first_name'];








?>
