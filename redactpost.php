<?php
//include auth.php file on all secure pages
include("auth.php");
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
			LOGO
		</div>
		<div class="logout">
		Логин 
		<?php 
				session_start();
				echo $_SESSION['username'];
				echo $_SESSION['user_id'];
				?>.</br>
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
			<a href='http://localhost/index.php'>index.php</a>
			see comments
		</div>

		<div class="content" >
			<div class="form">
		<h1>redact</h1><br> <p> </p>
		<?php
		$id= $_GET["id"];
		$mysql = new mysqli('localhost','root','','users');
			$query ="SELECT * FROM `test` WHERE `id`=\"".$id."\"";
 
			$result = mysqli_query($mysql, $query);
			if($result)
			$rows = "";
		while($rows = $result->fetch_assoc()){
		$header=$rows[varchar1];
		$text=$rows[text];
		}
		echo "<form name=\"add_post\" action=\"\" method=\"post\">
		 <p>Введите заголовок </p><input type=\"text\" name=\"header\" placeholder=\"введите заголовок\" value=\"".$header."\" required /><br>
		<p>Введите текст</p><textarea name=\"text\" rows=\"10\" cols=\"70\"  required>".$text."
		</textarea><br>
		
		<input type=\"submit\" name=\"submit\" value=\"создать\" />
		</form>"
		?>
		<?php
 $mysql = new mysqli('localhost','root','','users');
		 
	if ( !empty($_POST["header"]) &&  !empty($_POST["text"])) {
		$char = filter_var(trim($_POST['header']),
		FILTER_SANITIZE_STRING);
		$text = filter_var(trim($_POST['text']),
		FILTER_SANITIZE_STRING);
		//$char = $_POST["header"];
		//$text = $_POST["text"];
		$user=$_SESSION['username'];
		$userid=$_SESSION['user_id'];
		
		 $mysql->query("UPDATE `test` SET `varchar1` = '".$char."', `text` = '".$text."' WHERE `test`.`id` ='".$id."'");
		 
		
	
		
				
					echo "
		<h3>Пост update успешно</h3>
		<br/>Click here to <a href='http://localhost/main.php'>Вернуться на главную</a>";
				} 
		
		
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