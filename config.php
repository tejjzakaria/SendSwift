<?php
// MySQLi configuration
$servername = "localhost"; // Replace with your servername
$username = "root"; // Replace with your username
$password = ""; // Replace with your password
$dbname = "swiftsend2"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
