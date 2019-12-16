<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!doctype HTML>
<HTML>
<HEAD>
<meta charset="utf-8">
<link rel="stylesheet"  href="http://localhost/style.css">
<title> Личная страница</title>
<!-- <style>  -->
<!-- </style> -->
</head>
<body >
	<div class="wrapper">
		<div class="headerwrapper">
		<div class="logo">
			
		</div>
		<div class="logout">
		Вы авторизованы как 
		<?php 
				session_start();
				echo $_SESSION['username'];?>.</br>
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
			<h3>Статистика</h3>
			<div>
			<?php
			$mysql = new mysqli('localhost','root','','users');
			$query ="SELECT COUNT(*) FROM `test` WHERE `iduser`=\"".$_SESSION['user_id']."\" ";
 
			$result = mysqli_query($mysql, $query); 
			if($result)
			$countpost = mysqli_fetch_array($result);
			echo " Опубликовано ".$countpost[0]." постов<br>";
			$query1 ="SELECT COUNT(*) FROM `comments` WHERE `iduser`=\"".$_SESSION['user_id']."\" ";
 
			$result1 = mysqli_query($mysql, $query1); 
			if($result1)
			$countcomm = mysqli_fetch_array($result1);
			echo " Опубликовано ".$countcomm[0]." комментариев<br>";
			    mysqli_free_result($result);
			mysqli_close($mysql);
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