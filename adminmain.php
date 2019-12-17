<?php
//include auth.php file on all secure pages
include("auth.php");
?>
<?php
 $mysql = new mysqli('localhost','root','','users');
		 
	
				
		
		
?>
<!doctype HTML>
<HTML>
<HEAD>
<meta charset="utf-8">
<link rel="stylesheet"  href="http://localhost/style.css">
<title> Админ главная </title>
<!-- <style>  -->
<!-- </style> -->
</head>
<body >
	<div class="wrapper">
		<div class="headerwrapper">
		<div class="logo">
			
		</div>
		<div class="logout">
		Вы вошли как 
		<?php 
				
				echo $_SESSION['username'];
				echo $_SESSION["user_id"];?>.</br>
				
				<a href='http://localhost/userpage.php'>Мой профиль</a>
				<a href='http://localhost/logout.php'>Выйти</a></br>		
		</div>
		</div>
		<div class="mainwrapper">
		<div class="left" >
		left
		</div>
		

		<div class="menu">
			<a href='http://localhost/mainprivate.php'><h3>Главная</h3></a></br>
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
			<div>
			<?php
			$id= $_GET["id"];
		$mysql = new mysqli('localhost','root','','users');
			$query ="SELECT * FROM `users` WHERE `admin`=\"0\"";
 
			$result = mysqli_query($mysql, $query);
			if($result)
			$rows = "";
			echo "<div class=\"usertable\">";
			echo "<table>  ";
			echo "<tr><th>id</th><th>username</th><th>email</th><th>password</th><th></th><th></th></tr>";
			while($rows = $result->fetch_assoc()){
			echo "<tr><td>".$rows["id"]."</td>";
			echo "<td>".$rows["username"]."</td> ";
			echo "<td>".$rows["email"]."</td> ";
			echo "<td>".$rows["password"]."</td> ";
			echo " <td><a href='redactuser.php/?id=".$rows["id"]."'>Редактировать</a></td>";
			echo " <td><a href='deleteuser.php/?id=".$rows["id"]."'>Удалить</a></td>";
			echo " </tr>";
			
			

			}
			echo "</table>  ";
			echo "</div>  ";
			    
			mysqli_close($mysql);
			?>
			</div>
			<div class="">
			
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
