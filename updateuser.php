<?php
$mysql = new mysqli('localhost','root','','users');
		 
	if ( !empty($_POST["username"]) OR  !empty($_POST["password"]) OR  !empty($_POST["email"])) {
		$username = filter_var(trim($_POST['username']),
		FILTER_SANITIZE_STRING);
		$email = filter_var(trim($_POST['email']),
		FILTER_SANITIZE_STRING);
		$password = filter_var(trim($_POST['password']),
		FILTER_SANITIZE_STRING);
		//$char = $_POST["header"];
		//$text = $_POST["text"];
		$iduseer=$_GET["id"];
		$query1="UPDATE `users` SET `username` = '$username', `email` = '$email' , `password` = '$password' WHERE `users`.`id` ='$iduseer'";
		$sql = mysqli_query( $mysql, $query1);
		 if (!$sql) { echo mysqli_error($mysql); } else { echo "Работает"; } 
		}
		header("Location: http://localhost/redactuser.php/?id=".$iduseer."");
?>