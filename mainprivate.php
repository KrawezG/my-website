<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<!doctype HTML>
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
			LOGO PRIVATE
		</div>
		<div class="logout">
		Логин 
		<?php 
				session_start();
				echo $_SESSION['username'];?>.</br>
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
			content
			<div>
			<?php
			$mysql = new mysqli('localhost','root','','users');
			$query ="SELECT * FROM `test` ORDER BY `date` DESC";
 
			$result = mysqli_query($mysql, $query); 
			if($result)
			$rows = "";
			while($rows = $result->fetch_assoc()){
				echo "<div class=\"postmain\">";
				echo "<h6>".$rows["varchar1"]." </h6><br>";
				echo mb_strimwidth($rows["text"], 0, 30, "...");
				if( $rows["iduser"]==$_SESSION['user_id']) {
					$header=$rows["varchar1"];
					$text=$rows["text"];

					echo "
		<br/><a href='redactpost.php'>Редактировать</a> <a href='deletepost.php'>Удалить</a>";
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