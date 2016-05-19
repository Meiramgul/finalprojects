<?php
$make = $_GET['make'];
include("connection.php");
$result = mysql_query("SELECT DISTINCT Name FROM drugs WHERE illness='$make' ORDER BY Name;");


while($row = mysql_fetch_array($result))
{
	echo "<option value = \"" . $row['Name'] . "\">" . $row['Name'] . "</option>";
}

?>

