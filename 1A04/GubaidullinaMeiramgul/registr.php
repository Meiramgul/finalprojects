<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$connect = mysql_connect("localhost","root") or die(mysql_error());
mysql_select_db("project");

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $r_password = $_POST['r_password'];
    
    
    if($password == $r_password && strlen($password)>6){
        $password = md5($password);
        $query = mysql_query("INSERT INTO users VALUES('','$username','$login','$password')") or die(mysql_error());
        echo '<p id="p">You have registered successfully!</p>';
    
    }
    else{
    echo '<p id="p">Passwords do not match!</p>';
    }

}
?>
<style type="text/css">
body{background-image:url(fon6.png)}
#submit{ background-color:rgba(159, 159, 159, 0.23); width:120px; height:30px; margin-left: 590px;margin-top:15px; font-size:15px; color:#0b0b0b}
#username{background-color:rgba(255, 255, 255, 0.04);width:200px; height:30px; margin-left: 555px; margin-top:180px; color:#F000}
#login{background-color:rgba(255, 255, 255, 0);width:200px; height:30px; margin-left: 555px; margin-top:20px; color:#000}
#password{ background-color:rgba(255, 255, 255, 0);width:200px; height:30px; margin-left: 555px;margin-top:20px;color:#000}
#password1{ background-color:rgba(255, 255, 255, 0.01);width:200px; height:30px; margin-left: 555px;margin-top:20px;color:#000}
#register{color:#1b34f2; text-align:center; margin-top:20px; font-size:15px; margin-left:100px;}
#zdes{color:#2111ea}
#p{color:red; margin-left:540px; font-size:20px; margin-top:150px; position:absolute;z-index:+1}
</style>
</head>
<body>
<form method="post" action="registr.php"> 
    <input type="text"name="username"  placeholder="Username" required id="username" /></br>
    <input type="email" name="login"  placeholder="Login" required id="login" /></br>
    <input type="password" name="password" placeholder="Password" required id="password" /></br>
    <input type="password" name="r_password"  placeholder="Repeat password" required id="password1" /></br>
    <input type="submit" name="submit" value="Register" required id="submit" />
<p id="register">If you are already registered, you can log in <a href="avto.php" id="zdes">here</a></p>
</form>
</body>
</html>
