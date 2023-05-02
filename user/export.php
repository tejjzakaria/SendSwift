<?php
include "../config.php";
session_start();

if(isset($_POST['export'])) {
  // Get user data from database
  $userID = $_SESSION['userID'];
  $sql = "SELECT * FROM users WHERE id='$userID'";
  $result = mysqli_query($conn, $sql);
  $userData = mysqli_fetch_assoc($result);
  
  // Create query to get parcels data
  $query = "SELECT * FROM parcels WHERE userID='$userID'";
  $result = mysqli_query($conn, $query);
  
  // Create CSV file and write data to it
  $filename = "parcels.csv";
  $fp = fopen('php://output', 'w');
  fputcsv($fp, array('Tracking Number', 'Recipient Name', 'Recipient Phone Number', 'Recipient Address', 'Status', 'Payment Status', 'Delivery Date', 'Recipient City', 'Product Price', 'Comments'));
  while($row = mysqli_fetch_assoc($result)) {
    $paymentStatus = ($row['paymentStatus'] == 'paid') ? 'Paid' : 'Unpaid';
    $status = ucfirst($row['status']);
    fputcsv($fp, array($row['trackingNumber'], $row['recipientName'], $row['recipientPhoneNumber'], $row['recipientAddress'], $status, $paymentStatus, $row['deliveryDate'], $row['recipientCity'], $row['productPrice'], $row['comments']));
  }
  fclose($fp);
  
  // Send response back to the client
  header('Content-Type: text/csv');
  header('Content-Disposition: attachment; filename="' . $filename . '"');
  readfile($filename);
  exit();
}
?>
