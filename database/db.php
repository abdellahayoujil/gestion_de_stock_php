<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion_de_stock";

try {
    $conn = new PDO("mysql:host=$servername; dbname=$dbname", $username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "connection faild ". $e->getMessage();
}