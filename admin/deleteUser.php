<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../config.php";
session_start();

// Get parcel ID from URL parameter
$id = $_GET['id'];

// Delete parcel from database
$sql = "DELETE FROM users WHERE id='$id'";
$result = mysqli_query($conn, $sql);

if($result) {
  // Redirect to parcels page
  header("Location: viewUsers.php");
  exit();
}
?>
