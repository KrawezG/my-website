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
			LOGO
		</div>
		<div class="logout">
		Логин 
		<?php 
				session_start();
				echo $_SESSION['username'];
				echo $_SESSION['user_id'];
				?>.</br>
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
			<div class="form">
		<h1>redact</h1><br> <p> </p>
		<?php
		
		echo "<form name=\"add_post\" action=\"\" method=\"post\">
		 <p>Введите заголовок </p><input type=\"text\" name=\"header\" placeholder=\"введите заголовок\" value=\"".$GLOBALS[header]."\" required /><br>
		<p>Введите текст</p><textarea name=\"text\" rows=\"10\" cols=\"70\" value=\"".$GLOBALS[text]."\" required>
		</textarea><br>
		
		<input type=\"submit\" name=\"submit\" value=\"создать\" />
		</form>"
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