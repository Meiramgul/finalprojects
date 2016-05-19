<?php
include("connection.php");
$makeCondition = "";
$modelCondition = "";
if(isset($_REQUEST['make'])){
	if($_GET['make'] != "")
		$makeCondition = " WHERE Make = '" .$_GET['make']. "'";
}
if(isset($_REQUEST['model'])){
	if($_GET['model'] != "")
		$modelCondition = " AND Model = '" .$_GET['model']. "'"; 
}

$statement = "SELECT * FROM drugs " . $makeCondition . $modelCondition;

$result = mysql_query($statement);

echo "<table border='1'>";
while($row = mysql_fetch_array($result))
{
		echo "<tr>";
		echo "<td>" . $row['illness'] . "</td>";
		echo "<td>" . $row['Name'] . "</td>";
		echo "<td>" . $row['Price'] ."$". "</td>";
		echo "</tr>";
}
echo "</table>";

mysql_close($con);
?>
