<?php
if ($_POST){
    SESSION_START();
    require 'db.php';
    $email = MYSQLI_REAL_ESCAPE_STRING($con,$_POST['email']);
    $pw = MYSQLI_REAL_ESCAPE_STRING($con,$_POST['password']);

    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$pw'";
    $rs = Mysqli_Query($con,$sql);
    $num = mysqli_num_rows($rs);
    echo $num;

    if ($num == 1){
        $row = mysqli_fetch_array($rs);
        $_SESSION["user_id"] = $row['user_id'];
        header('Location: index.php');
    }else{+

        +
        header('Location: login.php');
        exit;
    }
    }
?>