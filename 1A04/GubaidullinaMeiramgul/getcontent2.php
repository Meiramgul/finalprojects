<?php
include("connection.php");
$makeCondition = "";
$modelCondition = "";
$_GET['make'];
if(isset($_REQUEST['make'])){
	if($_GET['make'] != "")
        $res = mysql_query("SELECT * FROM drugs WHERE id=".$_GET['make']." ORDER BY id");
        while (mysql_fetch_array)
		$makeCondition = " WHERE id = '" .$_GET['make']. "'";
}
?>
