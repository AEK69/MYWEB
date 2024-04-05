<?php
    session_start();
    if ($_SESSION["user_id"] == NULL){
            header('location:login.php');
    }
?>