<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!doctype HTML>
<HTML>
<HEAD>
<meta charset="utf-8">
<link rel="stylesheet"  href="http://localhost/style.css">
<title> Поиск </title>
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
			<h3>Поиск</h3>
			<div>
			<?php
			$mysql = new mysqli('localhost','root','','users');
			echo "<div><form name=\"search\" action=\"\" method=\"post\">
		 <p>Введите слово\фразу </p> <br>
		<p>Поиск </p><input type=\"text\" name=\"text\"   />
		
		<input type=\"submit\" name=\"submit\" value=\"искать\" />
		</form> </div>";
		if ( !empty($_POST["text"])) {
		
		$text = filter_var(trim($_POST['text']),
		FILTER_SANITIZE_STRING);
		//$char = $_POST["header"];
		//$text = $_POST["text"];
		$user=$_SESSION['username'];
		$userid=$_SESSION['user_id'];
		
		 $query="SELECT * FROM `test` WHERE `varchar1`LIKE '%".$text."%' ORDER BY `date` DESC";
		 $result = mysqli_query($mysql,$query) or die(mysqli_error());
					 
					$num=mysqli_num_rows($result);

					if($num>0) {
					$rows = "";
			while($rows = $result->fetch_assoc()){
			if ($rows["hide"]!=1) {
				echo "<div class=\"postmain\">";
				echo "<h4>".$rows["varchar1"]." </h4><br>";
				echo mb_strimwidth($rows["text"], 0, 30, "...");
				echo "<a href='postprivate.php/?id=".$rows["id"]."'>Читать далее</a>";
				echo "<p>".$rows["date"]."</p>";
				if( $rows["iduser"]==$_SESSION['user_id'] OR $_SESSION['username']=="admin") {
					$header=$rows["varchar1"];
					$text=$rows["text"];
					echo "<p><a href='redactpost.php/?id=".$rows["id"]."'>Редактировать</a> <a href='deletepost.php/?id=".$rows["id"]."'>Удалить</a></p>";
				}
				echo "</div>  ";
			} elseif ( $rows["iduser"]==$_SESSION['user_id']) {
				echo "<div class=\"postmain\">";
				echo "<h4> Вы скрыли этот пост</h4><br>";
			echo "<a href='http://localhost/hide.php/?id=".$rows["id"]."&page=postprivate.php'><h4>Открыть его</h4></a>";
				
			
				echo "</div>  ";
			} elseif ( $_SESSION['username']=="admin") {
				echo "<div class=\"postmain\">";
				echo "<h4>".$rows["varchar1"]." </h4><br>";
				echo mb_strimwidth($rows["text"], 0, 30, "...");
				echo "<a href='postprivate.php/?id=".$rows["id"]."'>Читать далее</a>";
				echo "<p>".$rows["date"]."</p>";
				if( $rows["iduser"]==$_SESSION['user_id'] OR $_SESSION['username']=="admin") {
					$header=$rows["varchar1"];
					$text=$rows["text"];
					echo "<p><a href='redactpost.php/?id=".$rows["id"]."'>Редактировать</a> <a href='deletepost.php/?id=".$rows["id"]."'>Удалить</a></p>";
				}
				echo "</div>  ";
				
				}
				}
			} else {
				$query4="SELECT * FROM `test` WHERE `text`LIKE '%".$text."%' ORDER BY `date` DESC";
		 $result4 = mysqli_query($mysql,$query4) or die(mysqli_error());
					 
					$num4=mysqli_num_rows($result4);

					if($num>0) {
					$rows = "";
			while($rows = $result4->fetch_assoc()){
			if ($rows["hide"]!=1) {
				echo "<div class=\"postmain\">";
				echo "<h4>".$rows["varchar1"]." </h4><br>";
				echo mb_strimwidth($rows["text"], 0, 30, "...");
				echo "<a href='postprivate.php/?id=".$rows["id"]."'>Читать далее</a>";
				echo "<p>".$rows["date"]."</p>";
				if( $rows["iduser"]==$_SESSION['user_id'] OR $_SESSION['username']=="admin") {
					$header=$rows["varchar1"];
					$text=$rows["text"];
					echo "<p><a href='redactpost.php/?id=".$rows["id"]."'>Редактировать</a> <a href='deletepost.php/?id=".$rows["id"]."'>Удалить</a></p>";
				}
				echo "</div>  ";
			} elseif ( $rows["iduser"]==$_SESSION['user_id']) {
				echo "<div class=\"postmain\">";
				echo "<h4> Вы скрыли этот пост</h4><br>";
			echo "<a href='http://localhost/hide.php/?id=".$rows["id"]."&page=postprivate.php'><h4>Открыть его</h4></a>";
				
			
				echo "</div>  ";
			} elseif ( $_SESSION['username']=="admin") {
				echo "<div class=\"postmain\">";
				echo "<h4>".$rows["varchar1"]." </h4><br>";
				echo mb_strimwidth($rows["text"], 0, 30, "...");
				echo "<a href='postprivate.php/?id=".$rows["id"]."'>Читать далее</a>";
				echo "<p>".$rows["date"]."</p>";
				if( $rows["iduser"]==$_SESSION['user_id'] OR $_SESSION['username']=="admin") {
					$header=$rows["varchar1"];
					$text=$rows["text"];
					echo "<p><a href='redactpost.php/?id=".$rows["id"]."'>Редактировать</a> <a href='deletepost.php/?id=".$rows["id"]."'>Удалить</a></p>";
				}
				echo "</div>  ";
				
				}
				}	
		
	
		
				
		
					}
					else {
					echo "Подходящих постов не найдено";	
						
					}} 
		}
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