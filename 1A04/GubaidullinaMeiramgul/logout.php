<?php
session_start();
$email=$_SESSION['email'];
header("location:mainpage2.php");
session_destroy();
echo "You have been logged out";
?>
