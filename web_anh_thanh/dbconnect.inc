<?php
require_once 'Model/dbconfig.php';
  
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
$con = mysqli_connect($host, $username, $password, $dbname);
?>