<?php
$id=$_GET['id'];
$q = "delete from register where id=$id";
include "hnf.php";
include "dbconnect.php";
$result= mysqli_query($con,$q);
echo "data delete successfully";
?>