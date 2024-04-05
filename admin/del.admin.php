<?php
require 'db.php';

// Check if the 'delete' parameter is set in the URL
if (isset($_GET['delete'])) {
    // Get the bill_id from the URL and sanitize it
    $bill_id = mysqli_real_escape_string($con, $_GET['delete']);

    // Use prepared statements to prevent SQL injection
    $stmt = $con->prepare("DELETE FROM bill WHERE bill_id = ?");
    $stmt->bind_param("i", $bill_id);
    $stmt->execute();
    $stmt->close();

    $stmt = $con->prepare("DELETE FROM bill_detail WHERE bill_id = ?");
    $stmt->bind_param("i", $bill_id);
    $stmt->execute();
    $stmt->close();
    
    // Redirect to the admin page
    header('location: admin.php');
} else {
    // Handle the case where 'delete' parameter is not set in the URL
    echo "Invalid parameters";
}
?>
