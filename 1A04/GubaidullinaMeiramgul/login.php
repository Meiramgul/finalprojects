<?php
session_start();
$email =$_POST['email'];
$password =$_POST['password'];
echo $email;
include("connect.php");

if ($email && $password) {
// info is provided
$password = md5($password);
$queryget = mysql_query("SELECT * FROM list WHERE email='$email' AND password='$password'");
$numrows = mysql_num_rows($queryget);
		//if ($numrows != 0)
		if ($queryget)
			{
			$_SESSION['email']=$email;
			echo '<script>window.open("main.php","_self")</script>';
			}
		else  echo "<script>alert('Your email was not found!')</script>";
		}else {
echo "Invalid info";
include("project_1.html");
}
?>
