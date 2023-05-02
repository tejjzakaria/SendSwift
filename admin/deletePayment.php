<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../config.php";
session_start();

// Get payment ID from URL parameter
$paymentID = $_GET['id'];

// Delete payment from database
$sql = "DELETE FROM payments2 WHERE id='$paymentID'";
$result = mysqli_query($conn, $sql);

if($result) {
  // Redirect to payments page
  header("Location: paymentsHistory.php");
  exit();
}
?>
