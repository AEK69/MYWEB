<?php
require 'db.php';
?>
<?php
$total = mysqli_real_escape_string($con, $_GET['total']);
$bill_id = mysqli_real_escape_string($con, $_GET['bill_id']);
$sql = "UPDATE bill SET bill_total = $total, status = 1 WHERE bill_id = $bill_id";
if (mysqli_query($con, $sql)) {
    header('Location: cart.php');
} else {
    echo "ERROR";
}
?>