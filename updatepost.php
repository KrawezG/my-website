<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<HTML>
<HEAD>
<meta charset="utf-8">
<link rel="stylesheet"  href="style.css">
<title> Gleb Krawez </title>
<!-- <style>  -->
<!-- </style> -->
</head>
<body >
	<div class="wrapper">
		<div class="headerwrapper">
		<div class="logo">
			LOGO
		</div>
		<div class="logout">
		Логин 
		<?php 
				session_start();
				echo $_SESSION['username'];
				
				?>.</br>
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
			<a href='index.php'>index.php</a>
			see comments
		</div>

		<div class="content" >
<?php
 $mysql = new mysqli('localhost','root','','users');
		 
	if ($_POST["header"] != empty && $_POST["text"] != empty) {
		$char = filter_var(trim($_POST['header']),
		FILTER_SANITIZE_STRING);
		$text = filter_var(trim($_POST['text']),
		FILTER_SANITIZE_STRING);
		//$char = $_POST["header"];
		//$text = $_POST["text"];
		$user=$_SESSION['username'];
		$userid=$_SESSION['user_id'];
		
		 $mysql->query("UPDATE `test` (`varchar1`,`text`)
		 SET varchar1='$char', text='$text'
		 WHERE id=$id"); 
	
		
				
					echo "
		<h3>Пост update успешно</h3>
		<br/>Click here to <a href='main.php'>Вернуться на главную</a>";
				} else {
			echo "
		<h3>Ошибка при создании поста</h3>";
				}
		
		$mysql->close();
?>
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