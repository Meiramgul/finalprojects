<?php
$con = mysql_connect("localhost", "root", "");
if(!$con)
{
    exit("Coneciont refused " . mysql_error());
}
mysql_select_db("project");
?>
