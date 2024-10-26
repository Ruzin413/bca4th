<?php
include "menu.php";
// session_start();
// if($_SESSION['username'] = "admin"){
//     die ("admin status cannot be changed");
// }else{
   
// }
 $id =$_GET['id'];
$q= "UPDATE `register` SET `status`='valid' WHERE id=$id";
include "dbconnect.php";
$result = mysqli_query($con,$q);
echo "<script>alert('user unsuspended');window.location.href = 'user.php';</script>";
?>