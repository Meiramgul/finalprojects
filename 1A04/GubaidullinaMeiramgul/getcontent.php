<html>
<head>
</head>
<body>
<style type="text/css">
#ttable{
margin-top: 20px;
    color: white;
    border:groove;
    background-color: rgba(0, 0, 255, 0.6);
}    
</style>
</body>
</html>
<?php
include("connection.php");
$makeCondition = "";
$modelCondition = "";
if(isset($_REQUEST['make'])){
	if($_GET['make'] != "")
		$makeCondition = " WHERE organ = '" .$_GET['make']. "'";
}
if(isset($_REQUEST['model'])){
	if($_GET['model'] != "")
		$modelCondition = " AND name = '" .$_GET['model']. "'"; 
}

$statement = "SELECT * FROM diseases " . $makeCondition . $modelCondition;

$result = mysql_query($statement);

echo "<br/>"; 
echo "<table border='1' id=\"ttable\">";
echo "<tr><td style='width:100px'> Organ </td><td style='width:100px'> Name of the disease </td><td style='width:140px'> Description of the diesease </td></tr>";
while($row = mysql_fetch_array($result))
{
		echo "<tr>";
		echo "<td style='width:100px'>" . $row['organ'] . "</td>";
		echo "<td style='width:100px'>" . $row['name'] . "</td>";
		echo "<td style='width:770px'>" . $row['discription'] . "</td>";
		echo "</tr>";
}
echo "</table>";

mysql_close($con);
?>
