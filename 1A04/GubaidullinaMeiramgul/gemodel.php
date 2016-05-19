<?php
$make = $_GET['make'];
include("connection.php");
$result = mysql_query("SELECT DISTINCT name FROM diseases WHERE organ='$make' ORDER BY name;");


while($row = mysql_fetch_array($result))
{
	echo "<option value = \"" . $row['name'] . "\">" . $row['name'] . "</option>";
}

?>


