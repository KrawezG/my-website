<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Регистрация</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
	<div class= "wrapper2">
		<div class="headerwrapper">
		<div class="logo2">
						
					</div>
					</div>
		 <?php
		require('db.php');
		if (isset($_REQUEST['username'])){
		 $username = stripslashes($_REQUEST['username']);
		 $username = mysqli_real_escape_string($con,$username); 
		 $email = stripslashes($_REQUEST['email']);
		 $email = mysqli_real_escape_string($con,$email);
		 $password = stripslashes($_REQUEST['password']);
		 $password = mysqli_real_escape_string($con,$password);
		 $trn_date = date("Y-m-d H:i:s");
				$query = "INSERT into `users` (username, password, email, trn_date)
		VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
				$result = mysqli_query($con,$query);
				if($result){
					echo "<div class='form'>
		<h3>You are registered successfully.</h3>
		<br/>Click here to <a href='login.php'>Login</a></div>";
		?>
		</div>
		<div class="footerwrapper">
			<div class="footer2">
					<h3>IU4-11B Krawez</h3>
				</div>
		</div >
	</div>
	<?php
				}
			}else{
		?>
		  
		 <div class="mainwrapper2"> 
		<div class="form">
		<h1>Регистрация</h1><br> <p> </p>
		<form name="registration" action="" method="post">
		 <p>Введите логин  </p><input type="text" name="username" placeholder="логин" required /><br>
		<p>Введите свою почту</p><input type="email" name="email" placeholder="почта" required /><br>
		<p>Введите пароль </p><input type="password" name="password" placeholder="пароль" required /><br>
		<p>Подтвердите пароль </p><input type="password" name="password2" placeholder="подтвердите пароль" required /><br>

		<input type="submit" name="submit" value="Зарегистрироваться" />
		</form>
		</div>
		<?php } ?>
		<div class="sysreq">
		<p>Зарегистрированы? <a href='login.php'>Войти</a></p>
		</div>
		
		
		<?php
		$conn = mysqli_connect("localhost", "user", "1234", "users");
		if(!$conn)
			die("conn err, ". mysqli_connect_error());
		mysqli_query($conn, "USE users");
		$query = "SELECT * FROM users";
		$result = mysqli_query($conn, $query);
		 
		$email_exists = false;
		$username_exists = false;
		$info_is_valid = true;
		while($row = mysqli_fetch_assoc($result))
		{
			 //echo $_POST["email"], " ",$_POST["username"] , "<br>";
			 //echo $row["email"], " ",$row["username"] , "<br>";
			if($row["email"] == $_POST["email"])
				$email_exists = true;
			if($row["username"] == $_POST["username"])
				$username_exists = true;
			
		}
		if (preg_match("![0-9a-z-_]+@[a-z]+[.][a-z]!", $_POST["email"]) &&
			($email_exists == false))
		{
			echo '<div class="sysreq">почта подходит<br> </div>';
		}
		else
		{
			echo '<div class="sysreq">почта не подходит<br></div>';
			$info_is_valid = false;
		}
		if ($_POST["username"] != NULL &&
			strlen($_POST["username"]) >= 6 &&
			preg_match("!^[a-zA-Z][a-zA-Z0-9_]*$!", $_POST["username"])&&
			($username_exists == false))
		{
			echo '<div class="sysreq">логин подходит<br></div>';
		}
		else
		{
			echo '<div class="sysreq">логин не подходит<br></div>';
			$info_is_valid = false;
		}

		if ($_POST["password"] != NULL &&
			strlen($_POST["password"]) >= 8 &&
			preg_match("![\%\$\#\@\&\*\^\|\\\/\~\[\]\{\}]!", $_POST["password"]) &&
			preg_match("![a-z]!", $_POST["password"]) &&
			preg_match("![A-Z]!", $_POST["password"]) &&
			preg_match("![0-9]!", $_POST["password"]) &&
			($_POST["password"] == $_POST["password2"])) //проверка правильности пароля
		{
			echo '<div class="sysreq">3пароль подходит<br></div>';
		}
		else
		{
			echo '<div class="sysreq">';
			echo 'Пароль не подходит. Он должен содержать хотя бы 1 строчную и заглавную буквы латинского алфавита, цифру и один знаков пунктуации или один из символов: %, $, #, @, &, *, ^, |, \, /, ~, [, ], {, }';
			echo ' <br></div>';
			$info_is_valid = false;
		}
		if($info_is_valid == true) //Есля введенные данные правильные, добавить пользователя в таблицу
		{
			$email = $_POST["email"];
			$username = $_POST["username"];
			$pass = $_POST["password"];

			$query = "INSERT INTO users(email, username, password) 
					  VALUES(\"".$email."\", \"".$username."\",\"".$pass."\")";
			mysqli_query($conn, $query);
			echo '<div class="sysreq2">';
			echo "Ваша регистрация прошла успешно! <a href='login.php'>Войти</a>";
			echo ' <br></div>';
		}
		else
		{
			echo '<div class="sysreq">';
			echo "Ваша регистрация была неудачной, попробуйте еще раз <a href='registration.php'>Зарегистрироваться</a></div>";
			echo ' <br>';
		}

		mysqli_close($conn);

		?>
		</div>
		<div class="footerwrapper">
		<div class="block">
		</div>
			<div class="footer2">
					<h3>IU4-11B Krawez</h3>
				</div>
		</div >
	</div>	
</body>
</html>