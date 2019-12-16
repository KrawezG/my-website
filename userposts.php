<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!doctype HTML>
<HTML>
<HEAD>
<meta charset="utf-8">
<link rel="stylesheet"  href="http://localhost/style.css">
<title> Ваши посты </title>
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
			<h3>Ваши посты</h3>
			<div>
			<?php
			$mysql = new mysqli('localhost','root','','users');
			$query ="SELECT * FROM `test` WHERE `iduser`=\"".$_SESSION['user_id']."\" ORDER BY `date` DESC";
 
			$result = mysqli_query($mysql, $query); 
			if($result)
			$rows = "";
			while($rows = $result->fetch_assoc()){
				echo "<div class=\"postuser\">";
				if ($rows["hide"]==0){
				echo "<br/><a href='http://localhost/hide.php/?id=".$rows["id"]."&page=userposts.php'>Скрыть</a>";
				} elseif ($rows["hide"]==1) {
				echo "<br/><a href='http://localhost/hide.php/?id=".$rows["id"]."&page=userposts.php'>Открыть</a>";
				} 
				echo "<h4>".$rows["varchar1"]." </h4><br>";
				echo mb_strimwidth($rows["text"], 0, 400, "...");
				echo "<a href='http://localhost/postprivate.php/?id=".$rows["id"]."'>Читать далее</a>";
				echo "<p>".$rows["date"]."</p>";
				if( $rows["iduser"]==$_SESSION['user_id']) {
					$header=$rows["varchar1"];
					$text=$rows["text"];
					echo "<br/><a href='http://localhost/redactpost.php/?id=".$rows["id"]."'>Редактировать</a> <a href='http://localhost/deletepost.php/?id=".$rows["id"]."'>Удалить</a>";
				}
				echo "</div>  ";
			}
			    mysqli_free_result($result);
			mysqli_close($mysql);
			?> 
			</div>
			<a href='postcreateprivate.php'>Добавить новый пост</a></br>	
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