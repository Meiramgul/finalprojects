<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$connect = mysql_connect("localhost","root") or die(mysql_error());
mysql_select_db("project");

if(isset($_POST['submit'])){
    $login = $_POST['login'];
    $password = md5($_POST['password']);
    
    $query = mysql_query("SELECT*FROM users WHERE login='$login'");
    $user_data = mysql_fetch_array($query);
    
    if($user_data['password']==$password ){
    session_start();
        $_SESSION['name']=$login;
        if($user_data['login']=="mika@gmail.com"){
        header("location:redactor.php");}
        else{header("location:mainpage3.php");
        }
    }
    else{
        echo '<p id="p">Wrong login or password!</p>'; }
}

?>
<style type="text/css">
body{background-image:url("fon5_5.jpg")}
#submit{ background-color:rgba(253, 248, 248, 0.18); width:120px; height:30px; margin-left: 555px;margin-top:20px; font-size:15px; color:#370bf0}
#login{background-color:rgba(255, 255, 255, 0);width:200px; height:30px; margin-left: 520px; margin-top:200px; color:#000; border:groove;}
#password{ background-color:rgba(255, 255, 255, 0);width:200px; height:30px; margin-left: 520px;margin-top:20px;color:#000}
#register{color:#370bf0; text-align:center; margin-top:20px; font-size:15px}
#zdes{color:#370bf0}
#p{color:#f4f4f5; margin-left:545px; font-size:15px; margin-top:150px; position:absolute;z-index:+1}
</style>
</head>
<form method="post" action="avto.php">
    <input type="email" name="login" placeholder="Login" required id="login" /></br>
    <input type="password" name="password" placeholder="Password" required id="password" /></br>
    <input type="submit" name="submit" value="Submit" id="submit" />
<p id="register">If you are not registered yet, you may register <a href="registr.php" id="zdes">here</a></p>
</form>
</html>
