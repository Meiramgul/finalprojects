<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
.container{
  display:inline;
  top:50%;
  left:50%;
  margin-top: -20px;
  width: 130px;
  height: 22px;
  text-align: center;
  border-radius:40px;
  background: #fff;
  border: 2px solid $green;
  color:$green;
  letter-spacing:1px;
  text-shadow:0;
  font:{
    size:12px;
    weight:bold;
  }
  cursor: pointer;
  transition: all 0.25s ease;
    &:hover {
    color:white;
    background: $green;
  }
  &:active {
    letter-spacing: 2px ;
  }
  &:after {
    content:"SUBMIT";
  }
}

.deleting{
    display: table-cell;
    font-weight: 800px
    padding-left:10px;
    border: 2px groove #10d33d;
    font: 15px arial;
    background-image: -webkit-linear-gradient(top, rgba(44, 208, 94, 0.73),rgb(29, 162, 54));
    background-image:    -moz-linear-gradient(top, rgba(44, 208, 94, 0.73),rgb(29, 162, 54));
    background-image:         linear-gradient(top, rgba(29, 162, 54, 0.81),rgba(232, 132, 232, 0.7));
    color: white;
    display: table;
    width: 100%;
    table-layout: fixed; /* Magic rule */
    border-collapse: collapse;
}    
.rounded {
   -webkit-border-radius: 20px;
   -moz-border-radius: 20px;
   border-radius: 20px;
   border: 3px groove #10d33d;
   background-color: rgba(28, 234, 52, 0.47); 
   font-size: 16px;
   height: 34px;
   width: 100px;
}
</style>
<?php
$connect = mysql_connect("localhost","root") or die(mysql_error());
mysql_select_db("kkj");

if(isset($_POST['submit'])){
    $juice = $_POST['username'];
    $sostav = $_POST['login'];
    $svoistva = $_POST['password'];
    $cena = $_POST['r_password'];
    
    
  
        $query = mysql_query("INSERT INTO sok VALUES('','$juice','$sostav','$svoistva','$cena')") or die(mysql_error());
        echo '<p class="deleting">Продукт добавлен успешно!</p>';
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
mysql_select_db("kkj");
$sql = "SELECT * FROM sok";
$res = mysql_query($sql); 
echo "<div class=\"deleting\">";
echo "Список продуктов";
echo "<br/>";
echo "<br/>";
echo "<table class=\"deleting\">";
echo "<tr><td style='width:100px'> ID </td><td style='width:100px'> Напиток </td><td style='width:100px'> Состав </td> <td style='width:500px'>Своисва</td><td style='width:100px'> Цена </td></tr>";
while ($row = mysql_fetch_array($res)){
    echo "<tr><td>". $row['id']."</td><td>". $row['juice']. "</td><td>" . $row['sostav'] ."</td><td>". $row['svoistva']."</td><td>" . $row['cena'] . "</td></tr>";
}
echo "</table>";
echo "<br/>";
echo "</div>";
?>
<?php
include("connection.php");
$result = mysql_query("SELECT DISTINCT id FROM sok ORDER BY id");
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
	echo "<option value = \"" . $row['id'] .   $row['juice'] . "\">" . $row['id'] .  $row['juice'] . "</option>";
}
?>
</select>
</table>
</form>
<div id="content"></div>
<form method="post" action="cars_form.php" > 
    <input type="text" name="username"  placeholder="Напиток" required id="username" style="color:#18dd18; font-weight:bold;" />
    <input type="text" name="login"  placeholder="Состав" required id="login" style="color:#18dd18; font-weight:bold;" />
    <input type="text" name="password" placeholder="Своиства" required id="password" style="color:#18dd18; font-weight:bold;"/>
    <input type="text" name="r_password"  placeholder="Цена" required id="password1" style="color:#18dd18; font-weight:bold;"/>
    <input type="submit" name="submit" class= "container" value="Insert" required id="submit" style="color:#18dd18; font-weight:bold;" />

</form>       

</body>
</html>
