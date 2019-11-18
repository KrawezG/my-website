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
	
			<div class="logo">
				
			</div>
			<div class="logout">
			Логин 
			<?php 
				session_start();
				echo $_SESSION['username'];?>.</br>
				<a href='logout.php'>Выйти</a></br>	
			</div>
			
	
			<div class="content">	
				<p align="center">Вы уже авторизованы как <?php 
				session_start();
				echo $_SESSION['username'];?>.</br>
				<a href='index.php'>На главную.</a></p>
			</div>
			
				
						
				<div class="left">
			
				</div>
						
				<div class="right">
						
				</div>
						
				<div class="footer">
					<p>@IU-4</p>
				</div>
						
		</div>
	</body>
</html>