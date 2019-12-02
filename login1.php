
<?php
	session_start();
		if(isset($_SESSION["username"])){
			header('Location:registration.php');
		}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Вход</title>
<link rel="stylesheet" href="style3.css" />
</head>
<body>
<?php
require('db.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
 $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
 $username = mysqli_real_escape_string($con,$username);
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($con,$password);
 //Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username'
and password='".md5($password)."'";
 $result = mysqli_query($con,$query) or die(mysql_error());
 $rows = mysqli_num_rows($result);
        if($rows==1){
     $_SESSION['username'] = $username;
            // Redirect user to index.php
     header("Location: index.php");
         }else{
 echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
 }
    }else{}
?>
<div class="form">
<h1>Вход</h1> <br>
<form action="" method="post" name="login">
 <p>Введите логин  </p><input type="text" name="username" placeholder="Логин" required /> <br>
 <p>Введите пароль </p><input type="password" name="password" placeholder="Пароль" required /><br>
<input name="submit" type="submit" value="Войти" /> <br>
</form>
<p>Не зарегистрированы? <a href='registration.php'>Зарегистрируйтесь здесь</a></p>
</div>

</body>
</html>