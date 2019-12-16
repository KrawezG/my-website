<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css" />
	</head>

	<body>	
	<div class= "wrapper">
		<div class="headerwrapper">
			<div class="logo">
				LOGO
			</div>
			<div class="logout">
			Логин 
			<?php 
				session_start();
				echo $_SESSION['username'];?>.</br>
				<a href='logout.php'>Выйти</a></br>	
			</div>
		</div>
		<div class="mainwrapper">
			<div class="left" >
				left
			</div>
			<div class="menu">
				menu
					<div class="line">
					</div>
				see comments
			</div>
			<div class="content" >
				<p align="center">Вы уже авторизованы как <?php 
				session_start();
				echo $_SESSION['username'];?>.</br>
				<a href='main.php'>На главную.</a></p>
					
			</div>
			<div class="right">
				right
			</div>
		</div>
		<div class="footerwrapper">
			<div class="footer">
				<p> footer </p>
			</div>
		</div>
	</div>
			
	</body>
</html>