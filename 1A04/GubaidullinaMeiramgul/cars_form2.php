<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$connect = mysql_connect("localhost","root") or die(mysql_error());
mysql_select_db("kkj");

if(isset($_POST['submit'])){
    $juice = $_POST['username'];
    $sostav = $_POST['login'];
    $svoistva = $_POST['password'];
    $cena = $_POST['r_password'];
    
    
  
        $query = mysql_query("INSERT INTO sok VALUES('','$juice','$sostav','$svoistva','$cena')") or die(mysql_error());
        echo '<p id="p">Продукт добавлен успешно!</p>';
 
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
mysql_select_db("kkj");
$sql = "SELECT * FROM sok";
$res = mysql_query($sql); 
echo "List of products";
echo "<br/>";
while ($row = mysql_fetch_array($res)){
   echo "<br> # ". $row['id']. $row['juice']. " " . $row['sostav'] ." " . $row['svoistva'] ." " . $row['cena'] . "<br>";
}
   echo "<br/>";
?>
<?php
include("connection.php");
$result = mysql_query("SELECT DISTINCT id FROM sok ORDER BY id");
?>

<form action="getcontent.php" method="get">
<table>
<tr><td colspan="2">Make</td></tr>
<tr><td colspan="2">
<select name="make" onchange="refresh1(this.value)">
<?php
while($row = mysql_fetch_array($result))
{
	echo "<option value = \"" . $row['id'] . "\">" . $row['id'] . "</option>";
}
?>
</select>



</table>
</form>
<div id="content"></div>
 <form method="post" action="cars_form.php" > 
    <input type="text" name="username"  placeholder="juice" required id="username" />
    <input type="text" name="login"  placeholder="sostav" required id="login" />
    <input type="text" name="password" placeholder="sostav" required id="password" />
    <input type="text" name="r_password"  placeholder="cena" required id="password1" />
    <input type="submit" name="submit" value="Insert" required id="submit" />

</form>   

</body>
</html>
