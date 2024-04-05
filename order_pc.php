<?php
require 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uid = $_SESSION["user_id"];
    $pro_id = mysqli_real_escape_string($con, $_POST['pro_id']);
    $qty = mysqli_real_escape_string($con, $_POST['qty']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $total = intval($qty) * intval($price);
    $pro_name = mysqli_real_escape_string($con, $_POST['pro_name']);
    $pro_image = mysqli_real_escape_string($con, $_POST['pro_image']);

    $sql_ch = "SELECT * FROM bill WHERE bill_total = 0 AND user_id = '$uid'";
    $rs_ch = mysqli_query($con, $sql_ch);
    $row_ch = mysqli_fetch_array($rs_ch);
    $bill_id = $row_ch['bill_id'];

    if (!$bill_id) {
        $sql_bill = "INSERT INTO bill VALUES(NULL, CURRENT_TIMESTAMP, $uid, 0, 0)";
        mysqli_query($con, $sql_bill);
        $bill_id = mysqli_insert_id($con);
    }

    $sql_proch = "SELECT * FROM bill_detail WHERE bill_id = $bill_id AND pro_id = $pro_id";
    $rs_proch = mysqli_query($con, $sql_proch);
    $ch = mysqli_num_rows($rs_proch);

    if ($ch == 1) {
        $sql_pro = "UPDATE bill_detail SET qty = qty + $qty, total = total + $total WHERE bill_id = $bill_id AND pro_id = $pro_id";
    } else {
        $sql_pro = "INSERT INTO bill_detail VALUES(NULL, '$bill_id', '$pro_id','$qty' ,'$price','$total','$pro_name','$pro_image')";
    }

    mysqli_query($con, $sql_pro);
}
?>
