<?php
//include auth.php file on all secure pages
include("auth.php");
$idc= $_GET["idc"];
		$mysql = new mysqli('localhost','root','','users');
			$query ="SELECT * FROM `comments` WHERE `id`=\"".$idc."\"";
 
			$result = mysqli_query($mysql, $query);
			if($result)
			$rows = "";
		$i=0;
		
		while($rows = $result->fetch_assoc()){
			session_start();
			if ($rows[iduser]==$_SESSION['user_id'] OR $_SESSION['username']=="admin") {
				$i=$i+1;
		} }
		if ($i>=1) {
		
			$rows = "";
?>
?>
<!doctype HTML>
<HTML>
<HEAD>
<meta charset="utf-8">
<link rel="stylesheet"  href="http://localhost/style.css">
<title> Удаление поста </title>
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
				<a href='http://localhost/userpage.php'>Мой профиль </a>
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
		//$char = $_POST["header"];
		//$text = $_POST["text"];
		$user=$_SESSION['username'];
		$idc=$_GET['idc'];
		$id=$_GET['id'];
		 $mysql->query("DELETE FROM `comments` WHERE `id`=$idc"); 
		echo "
		<h3>Комментарий удален успешно</h3>
		<br/><a href='http://localhost/postprivate.php/?id=".$id."'>Вернуться на главную</a>";		
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
<?php }  else { header("Location: http://localhost/main.php");
		}  
				?>