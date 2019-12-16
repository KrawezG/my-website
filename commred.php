<?php
 $mysql = new mysqli('localhost','root','','users');
if ( !empty($_POST["textred"]))  {
		
		$text = filter_var(trim($_POST['textred']),
		FILTER_SANITIZE_STRING);
		
		//$char = $_POST["header"];
		//$text = $_POST["text"];
		$iduseer=$_GET["id"];
		$query1="UPDATE `comments` SET `text` = '$text' WHERE `comments`.`id` ='$iduseer'";
		$sql = mysqli_query( $mysql, $query1);
		 if (!$sql) { echo mysqli_error($mysql); } 
		 
		}
		$postid=$_GET["idpost"];
		header("Location: http://localhost/postprivate.php/?id=".$postid."");

?>