<?php
//include auth.php file on all secure pages
include("auth.php");
$id= $_GET["id"];
		$mysql = new mysqli('localhost','root','','users');
			$query ="SELECT * FROM `chosen` WHERE `idpost`=\"".$id."\" and `iduser`=\"".$_SESSION['user_id']."\" ";
 
			$result = mysqli_query($mysql, $query);
			if($result)
			$rows = "";
		$i=0;
		$num=mysqli_num_rows($result);
		
		$userid=$_SESSION["user_id"];
		if ($num==0) {
			$mysql = new mysqli('localhost','root','','users');
			 $query="INSERT INTO `chosen` (`idpost`,`iduser`)
		 VALUES('$id','$userid')"; 
		 $result = mysqli_query($mysql,$query);
		} else { $userid=$_SESSION['user_id'];
		$mysql->query(" DELETE FROM `chosen` WHERE `idpost`=$id and `iduser`=$userid ");
		}
		$postid= $_GET["id"];
			if ($_GET["page"]=="chosen.php") {
				header("Location: http://localhost/chosen.php"); 
			} elseif ( $_GET["page"]=="postprivate.php") {
			header("Location: http://localhost/postprivate.php/?id=$postid"); 	
			} else {header("Location: http://localhost/main.php");}
 
				?>