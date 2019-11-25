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
			<div class="posts">
			<div class="postmain">
			post1
			</div>
			<div class="postmain">
			post1
			</div>
			<div class="postmain">
			post1
			</div>
			<div class="postmain">
			post1
			</div>
			<div class="postmain">
			post1
			</div>
			<div class="postmain">
			post1
			</div>
			<div class="postmain">
			post1
			</div>
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