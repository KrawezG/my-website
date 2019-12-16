
<!doctype HTML>
<HTML>
<HEAD>
<meta charset="utf-8">
<link rel="stylesheet"  href="style.css">
<title> Главная</title>
<!-- <style>  -->
<!-- </style> -->
</head>
<body >
	<div class="wrapper">
		<div class="headerwrapper">
		<div class="logo">
			
		</div>
		<div class="logout">
		Вы не авторизованы<br> 
		
				<a href='registration.php'>Зарегистрируйтесь</a> и</br>
				<a href='login.php'>войдите</a></br>
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
			
			<div>
			<?php
			$mysql = new mysqli('localhost','root','','users');
			$query ="SELECT * FROM `test` ORDER BY `date` DESC";
 
			$result = mysqli_query($mysql, $query); 
			if($result)
			$rows = "";
			while($rows = $result->fetch_assoc()){
				if ($rows["hide"]!=1) {
				echo "<div class=\"postmain\">";
				echo "<h3>".$rows["varchar1"]." </h3><br>";
				echo mb_strimwidth($rows["text"], 0, 30, "...");
				echo "<p>".$rows["date"]."</p>";
				echo "<a href='postopen.php/?id=".$rows["id"]."'>Читать далее</a>";
				echo "</div>  ";
				}
			}
			    mysqli_free_result($result);
			mysqli_close($mysql);
			?>
</div>			</div>
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