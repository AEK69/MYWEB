<?php
require 'db.php';

// Check if the 'id' and 'bill_detail' parameters are set in the URL
if (isset($_GET['id']) && isset($_GET['bill_detail'])) {
    $bill_id = mysqli_real_escape_string($con, $_GET['id']);
    $pro_id = mysqli_real_escape_string($con, $_GET['bill_detail']);

    // Use prepared statements to prevent SQL injection
    $stmt = $con->prepare("DELETE FROM bill_detail WHERE bill_id = ? AND pro_id = ?");
    $stmt->bind_param("ii", $bill_id, $pro_id);
    $stmt->execute();
    $stmt->close();

    // Redirect to the cart page
    header('location: cart.php');
} else {
    // Handle the case where 'id' or 'bill_detail' is not set in the URL
    echo "Invalid parameters";
}
?>