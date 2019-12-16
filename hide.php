<?php
//include auth.php file on all secure pages
include("auth.php");
$id= $_GET["id"];
		$mysql = new mysqli('localhost','root','','users');
			$query ="SELECT * FROM `test` WHERE `id`=\"".$id."\"";
 
			$result = mysqli_query($mysql, $query);
			if($result)
			$rows = "";
		$i=0;
		
		while($rows = $result->fetch_assoc()){
			session_start();
			if ($rows["iduser"]==$_SESSION['user_id']) {
				$i=$i+1;
		} }
		if ($i>=1) {
			$query ="SELECT * FROM `test` WHERE `id`=\"".$id."\"";
 
			$result = mysqli_query($mysql, $query);
			if($result)
			$rows = "";
			while($rows = $result->fetch_assoc()){
			if ($rows["hide"]==0){
			$mysql->query("UPDATE `test` SET `hide` = '1' WHERE `test`.`id` ='".$id."'"); }
			else { $mysql->query("UPDATE `test` SET `hide` = '0' WHERE `test`.`id` ='".$id."'"); }
				
		
			$rows = "";
			}
			if ($_GET["page"]=="userposts.php") {
				header("Location: http://localhost/userposts.php"); 
			} elseif ( $_GET["page"]=="postprivate.php") {
			header("Location: http://localhost/postprivate.php/?id=$id"); 	
			} else {header("Location: http://localhost/main.php");}
 }  else { header("Location: http://localhost/main.php");
		}  
				?>