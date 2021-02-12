<?php
$servername = "localhost";
$username = "root";
$password = "";
$db ="azamon";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
    die("Database Connection failed: " . mysqli_connect_error());
}
?>