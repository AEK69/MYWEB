<?php
require 'db.php';

if (isset($_GET['status'], $_GET['status2'])) {
    $bid = mysqli_real_escape_string($con, $_GET['status2']);
    $show_query1 = "UPDATE bill SET status=2 WHERE bill_id=$bid";
    $rs_billid3 = mysqli_query($con, $show_query1);
    
    header('Location:admin.php');
    exit();
}

// Checking if $row_billid3 is set before using it
?>
