<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../config.php";
session_start();

// Get parcel ID from URL parameter
$pickupRequestID = $_GET['id'];

// Delete parcel from database
$sql = "DELETE FROM pickupRequests WHERE id='$pickupRequestID'";
$result = mysqli_query($conn, $sql);

if($result) {
  // Redirect to parcels page
  header("Location: pickupHistory.php");
  exit();
}
?>
