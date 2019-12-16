<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!doctype HTML>
<HTML>
<HEAD>
<meta charset="utf-8">
<link rel="stylesheet"  href="style.css">
<title> Создать пост</title>
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
				<?php echo $_SESSION['user_id']; ?>.</br>
				<a href='http://localhost/userpage.php'>Мой профиль</a>
				<a href='logout.php'>Выйти</a></br>		
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
		<h1>Создание поста</h1><br> <p> </p>
		<form name="add_post" action="addpost.php" method="post">
		 <p>Введите заголовок </p><input type="text" name="header" placeholder="введите заголовок" required /><br>
		<p>Введите текст</p><textarea name="text" rows="10" cols="70" required>
		</textarea><br>
		
		<input type="submit" name="submit" value="создать" />
		</form>
		
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