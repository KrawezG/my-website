
<!doctype HTML>
<HTML>
<HEAD>
<meta charset="utf-8">
<link rel="stylesheet"  href="http://localhost/style.css">
<title>Просмотр поста </title>
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
			content
			<div class="post">
			<?php
			$id= $_GET["id"];
		$mysql = new mysqli('localhost','root','','users');
			$query ="SELECT * FROM `test` WHERE `id`=\"".$id."\"";
 
			$result = mysqli_query($mysql, $query);
			if($result)
			$rows = "";
			while($rows = $result->fetch_assoc()){
				
				echo "<h3>".$rows["varchar1"]." </h3><br>";
				echo  "<p>".$rows["text"]."</p>";
				echo "<p>".$rows["date"]."</p>";
				
				
			}
			    mysqli_free_result($result);
			mysqli_close($mysql);
			?>
			</div>
			<div class="comments">
<?php
			$mysql = new mysqli('localhost','root','','users');
			$query ="SELECT * FROM `comments` WHERE `idpost`=\"".$id."\" ORDER BY `date` ASC";
 
			$result = mysqli_query($mysql, $query); 
			if($result)
			$rows = "";
			while($rows = $result->fetch_assoc()){
				echo "<div class=\"comment1\">";
				echo "<h4>".$rows["name"]." </h4><br>";
				echo "<p>".$rows["text"]."</p>";
				
				echo "<p>".$rows["date"]."</p>";
				
				echo "</div>  ";
			}
			    mysqli_free_result($result);
			mysqli_close($mysql);
			?>			
		</div>
		<p>Только зарегистрированные и активированные пользователи могут добавлять комментарии.</p>
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