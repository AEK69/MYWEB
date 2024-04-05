
<?php
  $con = mysqli_connect('localhost','root','') or die('Error connection');
  mysqli_select_db($con,'ton22') or die('No database');
  mysqli_set_charset($con,'utf8');
?>
