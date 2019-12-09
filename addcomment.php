
<?php
 $mysql = new mysqli('localhost','root','','users');
		 
	if ( $_POST["text"] != NULL) {
		
		$text = filter_var(trim($_POST['text']),
		FILTER_SANITIZE_STRING);
		//$char = $_POST["header"];
		//$text = $_POST["text"];
		$id=$_GET['id'];
		$user=$_SESSION['username'];
		$userid=$_SESSION['user_id'];
		$date = date("Y-m-d H:i:s");
		 $mysql->query("INSERT INTO `comments` (`idpost`,`text`,`iduser`,`date`,`name`)
		 VALUES('$id','$text','$userid','$date','$user')"); 
	
		
				
					
		
				}
			$mysql->close();
		
				
		
		
?>
