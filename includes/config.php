<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "export_academy";

// Create connection
try {
  $conn = new PDO("mysql:host=$host;dbname=$db", "$user", "$password");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
  die('Unable to connect with the database');
}
