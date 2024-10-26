<?php
$server="localhost";
$username="root";
$password="";
$db_name="project";
$con= mysqli_connect($server,$username,$password,$db_name);
$db=mysqli_select_db($con,$db_name);
?>
