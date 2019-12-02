<?php
$host="localhost";
$user="user";
$pass="1234";
$base="user";
$conpost = mysqli_connect("$host","$user","$pass","$base");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>