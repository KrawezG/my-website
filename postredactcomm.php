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
		$mysql = new mysqli('localhost','root','','users');
if ( !empty($_POST["textred"]))  {
		
		$text = filter_var(trim($_POST['text']),
		FILTER_SANITIZE_STRING);
		
		//$char = $_POST["header"];
		//$text = $_POST["text"];
		$iduseer=$_GET["id"];
		$query1="UPDATE `comments` SET `text` = '$text' WHERE `comments`.`id` ='$iduseer'";
		$sql = mysqli_query( $mysql, $query1);
		 if (!$sql) { echo mysqli_error($mysql); } 
		 
		}


				
		
		
?>
<!doctype HTML>
<HTML>
<HEAD>
<meta charset="utf-8">
<link rel="stylesheet"  href="http://localhost/style.css">
<title> Изменить комментарий </title>
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
				if( $rows["iduser"]==$_SESSION['user_id'] OR $_SESSION['username']=="admin" ) {
					if ($rows["hide"]=="0"){
				echo "<br/><a href='http://localhost/hide.php/?id=".$rows["id"]."&page=postprivate.php'>Скрыть</a> пост";} else {
			echo "<br/> Вы скрыли этот пост, <a href='http://localhost/hide.php/?id=".$rows["id"]."&page=postprivate.php'>открыть его?</a>";}
				}
				echo "<h3>".$rows["varchar1"]." </h3><br>";
				echo "<p>".$rows["text"]."</p>";
				echo "<p>".$rows["date"]."</p>";
				if( $rows["iduser"]==$_SESSION['user_id'] OR $_SESSION['username']=="admin") {
					$header=$rows["varchar1"];
					$text=$rows["text"];
				
					echo "
		<br/><a href='http://localhost/redactpost.php/?id=".$rows["id"]."'>Редактировать</a> <a href='http://localhost/deletepost.php/?id=".$rows["id"]."'>Удалить</a>";
				}
				echo "</div>  ";
			}
			    mysqli_free_result($result);
				$mysql = new mysqli('localhost','root','','users');
				$query1 ="SELECT * FROM `chosen` WHERE `idpost`=\"".$id."\" and `iduser`=\"".$_SESSION['user_id']."\" ";
				
			$result = mysqli_query($mysql, $query1);
			$num=mysqli_num_rows($result);
			if($result)
			$rows = "";
		
 

					if($num>=1)
						{
						echo "<a href='http://localhost/addchosen.php/?id=".$id."&page=postprivate.php'>Удалить из избранного</a>";
						} elseif ($num==0) {
						echo "<a href='http://localhost/addchosen.php/?id=".$id."&page=postprivate.php'>Добавить в избранное</a>";
						}
			mysqli_close($mysql);
			?>
			</div>
			<div class="">
			<?php
				$mysql = new mysqli('localhost','root','','users');
if ( !empty($_POST["textred"]))  {
		
		$text = filter_var(trim($_POST['text']),
		FILTER_SANITIZE_STRING);
		
		//$char = $_POST["header"];
		//$text = $_POST["text"];
		$iduseer=$_GET["id"];
		$query1="UPDATE `comments` SET `text` = '$text' WHERE `comments`.`id` ='$iduseer'";
		$sql = mysqli_query( $mysql, $query1);
		 if (!$sql) { echo mysqli_error($mysql); }
else { $id=$_GET["id"];
	echo "<p>Комментарий обновлен</p><br>
	<a href='http://localhost/postprivate.php/?id=".$id."'>Вернуться назад</a>
	";
}		 
		 
		}
			$mysql = new mysqli('localhost','root','','users');
			$query2 ="SELECT * FROM `comments` WHERE `id`=\"".$_GET["idc"]."\" ";
 
			$result2 = mysqli_query($mysql, $query2); 
			if($result2)
			$rows = "";
			while($rows = $result2->fetch_assoc()){
				

					
					echo "<div><form name=\"add_post\" action=\"http://localhost/commred.php/?id=".$rows["id"]."&idpost=".$id."\" method=\"post\">
		 <p>Изменение поста </p> <h4>".$rows["name"]." </h4><br>
		<p>Введите текст</p><textarea name=\"textred\" rows=\"10\" cols=\"70\"  required>".$rows["text"]."
		</textarea><br>
		
		<input type=\"submit\" name=\"submit\" value=\"изменить\" />
		</form> </div>";
					
					
						
				
				}
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