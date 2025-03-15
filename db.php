<?php

$host="localhost";
$username="phpmyadmin";
$password="aadilmiya";
$dbname= "blogWebsite";

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// echo "database connected successfully";

?>