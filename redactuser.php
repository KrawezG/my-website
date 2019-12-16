<?php
//include auth.php file on all secure pages
include("auth.php");
$id= $_SESSION["user_id"];
		$mysql = new mysqli('localhost','root','','users');
			$query ="SELECT * FROM `users` WHERE `id`=\"".$id."\" ";
 
			$result = mysqli_query($mysql, $query);
			if($result)
			$rows = "";
		$i=0;
		
		while($rows = $result->fetch_assoc()){
			session_start();
			if ($rows[admin]==1) {
				$i=$i+1;
		} }
		if ($i>=1) {
		
			$rows = "";
	
		 
	
		
		
?>
<!doctype HTML>
<HTML>
<HEAD>
<meta charset="utf-8">
<link rel="stylesheet"  href="http://localhost/style.css">
<title> Изменить пользователя </title>
<!-- <style>  -->
<!-- </style> -->
</head>
<body >
	<div class="wrapper">
		<div class="headerwrapper">
		<div class="logo">
			
		</div>
		<div class="logout">
		Вы вошли как 
		<?php 
				session_start();
				echo $_SESSION['username'];
				
				?>.</br>
				<a href='http://localhost/userpage.php'>Мой профиль</a>
				<a href='http://localhost/logout.php'>Выйти</a></br>		
		</div>
		</div>
		<div class="mainwrapper">
		<div class="left" >
		
		</div>
		

		<div class="menu">
			
			<a href='http://localhost/main.php'><h3>Главная</h3></a></br>
			<div class="line">
			</div>
			<a href='http://localhost/search.php'><h3>Поиск</h3></a></br>
			<div class="line">
			</div>
			<a href='http://localhost/chosen.php'><h3>Избранное</h3></a></br>
			<div class="line">
			</div>
			<a href='http://localhost/userposts.php'><h3>Мои посты</h3></a>
		</div>

		<div class="content" >
			<div class="form">
		<h1>Изменить</h1><br> <p> </p>
		<?php
		$mysql = new mysqli('localhost','root','','users');
if ( !empty($_POST["username"]) &&  !empty($_POST["password"]) &&  !empty($_POST["email"])) {
		$username = filter_var(trim($_POST['username']),
		FILTER_SANITIZE_STRING);
		$email = filter_var(trim($_POST['email']),
		FILTER_SANITIZE_STRING);
		$password = filter_var(trim($_POST['password']),
		FILTER_SANITIZE_STRING);
		//$char = $_POST["header"];
		//$text = $_POST["text"];
		$iduseer=$_GET["id"];
		$query1="UPDATE `users` SET `username` = '$username', `email` = '$email' , `password` = '$password' WHERE `users`.`id` ='$iduseer'";
		$sql = mysqli_query( $mysql, $query1);
		 if (!$sql) { echo mysqli_error($mysql); } 
		 
		}
		$id1= $_GET["id"];
		$mysql = new mysqli('localhost','root','','users');
			$query ="SELECT * FROM `users` WHERE `id`=\"".$id1."\"";
 
			$result = mysqli_query($mysql, $query);
			if($result)
			$rows = "";
		while($rows = $result->fetch_assoc()){
		
		
		echo "<form name=\"add_post\" action=\"\" method=\"post\">
		 <p>Изменение имени </p><input type=\"text\" name=\"username\"  value=\"".$rows["username"]."\" required /><br>
		<p>Изменения почты </p><input type=\"text\" name=\"email\"  value=\"".$rows["email"]."\" /><br>
		<p>Изменение пароля </p><input type=\"text\" name=\"password\"  value=\"".$rows["password"]."\"  /><br>
		<input type=\"submit\" name=\"submit\" value=\"Изменить\" />
		</form>";
		}
		?>
			
		<?php
		 
		
		unset($_POST["username"]);
		unset($_POST["password"]);
		unset($_POST["email"]);
?>
		</div>
		
		</div>
		<div class="right">
		
		</div>
		</div>
		<div class="footerwrapper">
		<div class="footer">
			<h3>IU4-11B Krawez</h3>
		</div>
		</div>
	</div>
</body>
</html>
		<?php }  else { header("Location: http://localhost/privatepost.php");
		}  
				?>