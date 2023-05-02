<?php

include "../config.php";
session_start();



// Retrieve the user ID from the session data
$userID = $_SESSION['userID'];

// Delete the user from the database using the user ID
$sql = "DELETE FROM users WHERE id='$userID'";
if (mysqli_query($conn, $sql)) {
    // User deleted successfully
    header('Location: ../index.php');
    exit;
} else {
    // Error deleting user
    echo "Error deleting user: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
