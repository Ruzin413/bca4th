<?php
$id=$_GET['id'];
$q = "delete from Purchases where id=$id";
include "hnf.php";
include "dbconnect.php";
$result= mysqli_query($con,$q);
echo "<script>alert('Order Cancelled');window.location.href = 'pitem.php';</script>";
?>