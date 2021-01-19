<?php
$username="root";
$password="";
$database="thesislibrary";
$servername="localhost";

$con=mysqli_connect($servername,$username,$password);
mysqli_select_db($con,$database);

if(!$con){
	die('Could not connect'.mysqli_error());
}
?>