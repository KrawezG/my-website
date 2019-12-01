
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
			LOGO
		</div>
		<div class="logout">
		Вы не зарегистрированы. <br> 
		
				<a href='logout.php'>Зарегистрироваться</a></br>		
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
				
				echo "</div>  ";
			}
			    mysqli_free_result($result);
			mysqli_close($mysql);
			?>
</div>			</div>
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