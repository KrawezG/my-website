<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: mainopen.php");
 }
 elseif ( $_SESSION['username']=="admin")
 { header("Location: adminmain.php");} else
 
 { header("Location: mainprivate.php");
 }
?>