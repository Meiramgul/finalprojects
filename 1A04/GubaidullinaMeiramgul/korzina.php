<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
xmlhttp1.open("GET","getmodel.php?make="+make,true);
xmlhttp1.send();

xmlhttp2.open("GET","getcontent.php?make="+make,true);
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
  var query = "getcontent.php?make="+make+"&model="+model;
  xmlhttp3.open("GET",query,true);
  xmlhttp3.send();
}
</script>
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
xmlhttp1.open("GET","getmodel.php?id="+deleter,true);
xmlhttp1.send();
</script>
<?php
include("connection.php");
$result = mysql_query("SELECT DISTINCT id FROM drugs ORDER BY id");
?>
<form action="getcontent.php" method="get">
<table>
<tr><td colspan="2" style="color:#18dd18; font-weight:bold;">Выберите продукт для удаления</td></tr>
<tr></tr>
<tr><td colspan="2">
<select name="make" onchange="refresh1(this.value)" class="rounded">
<?php
while($row = mysql_fetch_array($result))
{
	echo "<option value = \"" . $row['id'] .   $row['name'] . "\">" . $row['id'] .  $row['name'] . "</option>";
}
?>
</select>
</table>
</form>
    </head>
    </html>
