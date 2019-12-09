<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<?php
 $mysql = new mysqli('localhost','root','','users');
		 
	if ( $_POST["text"] != NULL) {
		
		$text = filter_var(trim($_POST['text']),
		FILTER_SANITIZE_STRING);
		//$char = $_POST["header"];
		//$text = $_POST["text"];
		$id=$_GET['id'];
		$user=$_SESSION['username'];
		$userid=$_SESSION['user_id'];
		$date = date("Y-m-d H:i:s");
		 $mysql->query("INSERT INTO `comments` (`idpost`,`text`,`iduser`,`date`,`name`)
		 VALUES('$id','$text','$userid','$date','$user')"); 
	
		
				
				header("Refresh: 0");	
		
				}
			$mysql->close();
		
				
		
		
?>
<!doctype HTML>
<HTML>
<HEAD>
<meta charset="utf-8">
<link rel="stylesheet"  href="http://localhost/style.css">
<title> Gleb Krawez </title>
<!-- <style>  -->
<!-- </style> -->
</head>
<body >
	<div class="wrapper">
		<div class="headerwrapper">
		<div class="logo">
			LOGO PRIVATE
		</div>
		<div class="logout">
		Логин 
		<?php 
				session_start();
				echo $_SESSION['username'];?>.</br>
				<a href='http://localhost/logout.php'>Выйти</a></br>		
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
			<a href='http://localhost/main.php'>index.php</a>
			see comments
		</div>

		<div class="content" >
			content
			<div>
			<?php
			$id= $_GET["id"];
		$mysql = new mysqli('localhost','root','','users');
			$query ="SELECT * FROM `test` WHERE `id`=\"".$id."\"";
 
			$result = mysqli_query($mysql, $query);
			if($result)
			$rows = "";
			while($rows = $result->fetch_assoc()){
				echo "<div class=\"post\">";
				echo "<h3>".$rows["varchar1"]." </h3><br>";
				echo "<p>".$rows["text"]."</p>";
				echo "<p>".$rows["date"]."</p>";
				if( $rows["iduser"]==$_SESSION['user_id']) {
					$header=$rows["varchar1"];
					$text=$rows["text"];
				
					echo "
		<br/><a href='http://localhost/redactpost.php/?id=".$rows["id"]."'>Редактировать</a> <a href='http://localhost/deletepost.php/?id=".$rows["id"]."'>Удалить</a>";
				}
				echo "</div>  ";
			}
			    mysqli_free_result($result);
			mysqli_close($mysql);
			?>
			</div>
			<div class="">
			<?php
			$mysql = new mysqli('localhost','root','','users');
			$query ="SELECT * FROM `comments` WHERE `idpost`=\"".$id."\" ORDER BY `date` DESC";
 
			$result = mysqli_query($mysql, $query); 
			if($result)
			$rows = "";
			while($rows = $result->fetch_assoc()){
				echo "<div class=\"comment\">";
				echo "<h4>".$rows["name"]." </h4><br>";
				echo "<p>".$rows["text"]."</p>";
				
				echo "<p>".$rows["date"]."</p>";
				if( $rows["iduser"]==$_SESSION['user_id']) {
					$header=$rows["varchar1"];
					$text=$rows["text"];
				
					echo "
		<br/><a href='redactpost.php/?id=".$rows["id"]."'>Редактировать</a> <a href='deletepost.php/?id=".$rows["id"]."'>Удалить</a>";
				}
				echo "</div>  ";
			}
			    mysqli_free_result($result);
			mysqli_close($mysql);
			?>
			</div>
			<div class="form">
			<h3>Add comment</h3><br> <p> </p>
				<?php echo "<form name=\"add_post\" action=\"\" method=\"post\">
				
				<p>Введите текст</p><textarea name=\"text\" rows=\"3\" cols=\"50\" required>
				</textarea><br>
				
				<input type=\"submit\" name=\"submit\" value=\"создать\" />
				</form>";
				

				
					
		
				
			?>
			</div>
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