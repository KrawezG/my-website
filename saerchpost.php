<?php
 $mysql = new mysqli('localhost','root','','users');
		 
	if ( !empty($_POST["text"])) {
		
		$text = filter_var(trim($_POST['text']),
		FILTER_SANITIZE_STRING);
		//$char = $_POST["header"];
		//$text = $_POST["text"];
		$user=$_SESSION['username'];
		$userid=$_SESSION['user_id'];
		
		 $query="SELECT * FROM `test` WHERE `varchar1`LIKE '%".$text."%' ORDER BY `date` DESC";
		 $result = mysqli_query($con,$query) or die(mysql_error());
					 
					$num=mysqli_num_rows($result);

					if($num>0) {
						
					}
		
	
		
				
		
				} 
		
		
?>