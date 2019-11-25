<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: mainopen.php");
 }
 else 
 { header("Location: mainprivate.php");
 }
?>