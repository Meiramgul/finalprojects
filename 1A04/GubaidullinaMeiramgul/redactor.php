<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
.container{
  display:inline;
  top:50%;
  left:50%;
  width: 130px;
  height: 22px;
  text-align: center;
  letter-spacing:1px;
  font-size:12px;
  font-weight:bold;
  }
.deleting{
    display: table-cell;
    font-weight: 800px;
    padding-left:10px;
    border: 2px groove #10d33d;
    font: 15px arial;
    background-image: linear-gradient(top, rgba(29, 162, 54, 0.81),rgba(232, 132, 232, 0.7));
    display: table;
    width: 100%;
    table-layout: fixed; 
    border-collapse: collapse;
}    
.rounded {
   background-color: rgba(37, 74, 229, 0.13); 
   font-size: 16px;
   height: 34px;
   width: 100px;
    color: white;
}
</style>
<?php
$connect = mysql_connect("localhost","root") or die(mysql_error());
mysql_select_db("project");

if(isset($_POST['submit'])){
    $illn = $_POST['login'];
    $name = $_POST['password'];
    $price = $_POST['ppp'];
    $query = mysql_query("INSERT INTO drugs VALUES('','$illn','$name','$price')") or die(mysql_error());
        echo '<p class="deleting">The product is added successfully!</p>';
exit;
}
?>
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
</head>
<body>
<?php
$connect = mysql_connect("localhost","root") or die(mysql_error());
mysql_select_db("project");
$sql = "SELECT * FROM drugs";
$res = mysql_query($sql);
$sql2 = "SELECT * FROM users";
$res2 = mysql_query($sql2);
echo '<p><a href="logout.php">Log out</a></p>';

echo "List of clients and products";
echo "<br/>";
echo "<br/>";
echo "<table class=\"deleting\">";
echo "<tr><td style='width:100px'> Illness </td><td style='width:100px'> Product </td> <td style='width:500px'>Price</td></tr>";
while ($row = mysql_fetch_array($res)){
    echo "<tr><td>". $row['illness']. "</td><td>" . $row['Name'] ."</td><td>". $row['Price']."</td></tr>";
}
echo "</table>";
echo "<br/>";
echo "<table class=\"deleting\">";
echo "<tr><td style='width:100px'> ID </td><td style='width:100px'> Buyer's name </td><td style='width:100px'> Login </td></tr>";
while ($row2 = mysql_fetch_array($res2)){
    echo "<tr><td>". $row2['id']."</td><td>". $row2['username']. "</td><td>" . $row2['login'] ."</td></tr>";
}
echo "</table>";
echo "<br/>";
echo "</div>";
echo "<br/>";
echo "<br/>";
?>

<div id="content"></div>
<form method="post" action="redactor.php" > 
    <input type="text" name="login"  placeholder="For which desease is it used for" required id="login" style="color:#18dd18; font-weight:bold; width:300px;" />
    <input type="text" name="password" placeholder="Name" required id="password" style="color:#18dd18; font-weight:bold;"/>
    <input type="text" name="ppp" placeholder="Price" required id="password" style="color:#18dd18; font-weight:bold;"/>
    <input type="submit" name="submit" class= "container" value="Insert" required id="submit" style="color:#18dd18; font-weight:bold;" />

</form>  
    
    
<?php
include("connection.php");
$result = mysql_query("SELECT DISTINCT id FROM drugs ORDER BY id");
?>
<form action="getcontent.php" method="get">
<table>
<tr><td colspan="2" style="color:#18dd18; font-weight:bold;">Choose the product to delete</td></tr>
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
<div id="content"></div>
</body>
</html>
