<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<HTML>
<HEAD>
<meta charset="utf-8">
<link rel="stylesheet"  href="style.css">
<title> Создание поста</title>
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
<?php
 $mysql = new mysqli('localhost','root','','users');
		 
	if ($_POST["header"] != NULL && $_POST["text"] != NULL) {
		$char = filter_var(trim($_POST['header']),
		FILTER_SANITIZE_STRING);
		$text = filter_var(trim($_POST['text']),
		FILTER_SANITIZE_STRING);
		//$char = $_POST["header"];
		//$text = $_POST["text"];
		$user=$_SESSION['username'];
		$userid=$_SESSION['user_id'];
		$date = date("Y-m-d H:i:s");
		 $mysql->query("INSERT INTO `test` (`varchar1`,`text`,`iduser`,`date`)
		 VALUES('$char','$text','$userid','$date')"); 
	
		
				
					echo "
		<h3>Пост создан успешно</h3>
		<br/>Click here to <a href='main.php'>Вернуться на главную</a>";
				} else {
			echo "
		<h3>Ошибка при создании поста</h3>";
				}
		
		$mysql->close();
?>
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