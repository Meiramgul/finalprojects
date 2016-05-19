<?php
session_start();
$email=$_SESSION['email'];
if ($email)
{
echo "Welcome $email | <a href='logout.php'>Logout</a>";
}
else
{
echo "You are not logged in";
}
?>
