<?php
$id=$_POST['id'];
$q = "delete from cart where id=$id";
include "hnf.php";
include "dbconnect.php";
$result= mysqli_query($con,$q);
echo "<script>window.location.href = 'cart.php';</script>";
?>