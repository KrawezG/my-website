<?php
	session_start();
		if(isset($_SESSION["username"])){
			header('Location:regpr.php');
		}
		require('db.php');
				session_start();
				if (isset($_POST['username'])){
					 $username = stripslashes($_POST['username']);
					 $username = mysqli_real_escape_string($con,$username);
					 $password = stripslashes($_POST['password']);
					 $password = mysqli_real_escape_string($con,$password);
					 $query = "SELECT * FROM `users` WHERE username='$username'
					and password='$password'";
					$result = mysqli_query($con,$query) or die(mysql_error());
					 $row=mysqli_fetch_assoc($result);
					$num=mysqli_num_rows($result);

					if($num==1)
							{
							session_start(); 
							
							$_SESSION['user_id']= $row['id'];;
							$_SESSION['username'] = $username;
							header("Location: index.php");
							} else
							{
							echo "<div class='error'>
							<h3>Неверно введён логин/пароль.</h3> <a href='login.php'>Войти</a>
							</div>";
							}
					}else{
?>
<!DOCTYPE html>
<html>
		<head>
				<meta charset="utf-8">
				<title>Вход</title>
				<link rel="stylesheet" href="style.css" />
		</head>
		<body>
			<div class= "wrapper2">
		<div class="headerwrapper">
		<div class="logo2">
						
					</div>
					</div>
	
			 <div class="mainwrapper2"> 
		<div class="form2">
			<h1>Авторизация</h1>
			<form action="" method="post" name="login">
				<div class="auth">
				<label>Введите Ваше имя: <br/> <input type="text" name="username" placeholder="Имя пользователя" required /> <br/>
				<label>Введите Ваш пароль: </br> <input type="password" name="password" placeholder="Пароль" required /> <br/>
				<input name="submit" type="submit" value="Готово" /> <br/>
				<p>Ещё не зарегистрированы? <a href="registration.php">Зарегистрироваться</a></p>
				</div>
			</form>
		</div>
		</div>
		<div class="footerwrapper">
		<div class="block">
		</div>
			<div class="footer2">
					<p>IU4-11B Krawez</p>
				</div>
		</div >
	</div>
</body>	
</html>
					<?php 
					}
					?>