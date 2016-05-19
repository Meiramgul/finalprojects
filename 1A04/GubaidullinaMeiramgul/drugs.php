<html>
<head>
<script type="text/javascript">
var make;
function refresh1(value)
{
make = value;
if (make=="")
  {
  document.getElementById("model").innerHTML="";
  return;
  } 

  xmlhttp1=new XMLHttpRequest();
  xmlhttp2=new XMLHttpRequest();

xmlhttp1.onreadystatechange=function()
  {
  if (xmlhttp1.readyState==4 && xmlhttp1.status==200)
    {
    document.getElementById("model").innerHTML=xmlhttp1.responseText;
    }
  }
xmlhttp2.onreadystatechange=function()
  {
  if (xmlhttp2.readyState==4 && xmlhttp2.status==200)
    {
    document.getElementById("content").innerHTML=xmlhttp2.responseText;
    }
  }
xmlhttp1.open("GET","getmodel2.php?make="+make,true);
xmlhttp1.send();

xmlhttp2.open("GET","getcontent2.php?make="+make,true);
xmlhttp2.send();
}

function refresh2(model){
  xmlhttp3=new XMLHttpRequest();

xmlhttp3.onreadystatechange=function()
  {
  if (xmlhttp3.readyState==4 && xmlhttp3.status==200)
    {
    document.getElementById("content").innerHTML=xmlhttp3.responseText;
    }
  }
  var query = "getcontent2.php?make="+make+"&model="+model;
  xmlhttp3.open("GET",query,true);
  xmlhttp3.send();
}
<script type="text/javascript">
var deleter;
function refresh1(value)
{
deleter = value;
if (deleter=="")
  {
  document.getElementById("model").innerHTML="";
  return;
  } 
xmlhttp1=new XMLHttpRequest();
xmlhttp1.open("GET","getmodel2.php?id="+deleter,true);
xmlhttp1.send();
</script>  
</head>
</html>
<?php
include("mainpage.php");
$connect = mysql_connect("localhost","root") or die(mysql_error());
mysql_select_db("project");
$sql = "SELECT * FROM drugs";
$res = mysql_query($sql); 
echo "<div class=\"del\">";
echo "List of products";
echo "<br/>";
echo "<br/>";
echo "<table class=\"del2\">";
echo "<tr><td style='width:100px'> ID </td><td style='width:100px'> Illness </td><td style='width:100px'> Name </td> <td style='width:500px'>Price</td></tr>";
while ($row = mysql_fetch_array($res)){
    echo "<tr><td>". $row['Id']."</td><td>". $row['illness']. "</td><td>" . $row['Name'] ."</td><td>". $row['Price']."</td></tr>";
}
echo "</table>";
echo "<br/>";
include("connection.php");
$result = mysql_query("SELECT DISTINCT id FROM drugs ORDER BY id");
?>
<form action="getcontent2.php" method="get">
<table>

<tr></tr>
<tr><td colspan="2">
