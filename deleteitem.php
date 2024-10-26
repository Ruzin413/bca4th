<?php
$id=$_GET['id'];
$q = "delete from newprod where id=$id";
include "hnf.php";
include "dbconnect.php";
$result= mysqli_query($con,$q);
echo "<script> alert ('Item deleted'); window.location.href = 'displayitem.php';</script>";
?>
<?php
include "f.php";
?>