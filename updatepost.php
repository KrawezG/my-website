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
		
		 $mysql->query("UPDATE `test` SET `varchar1` = '".$char."', `text` = '".$text."' WHERE `id` ='".$id."'");
		 
		
	
		
				
		
				} 
		
		header("Location: http://localhost/redactpost.php/?id=".$_GET["id"]."");
?>