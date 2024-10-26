<?php
include "menu.php";
// session_start();
// if($_SESSION['username'] = "admin"){
//     echo "<script>alert('admin status cannot change');window.location.href = 'user.php';</script>";
// }else{
//   } 
 $id =$_GET['id'];
$q= "UPDATE `register` SET `status`='suspended' WHERE id=$id";
include "dbconnect.php";
$result = mysqli_query($con,$q);
echo "<script>alert('user suspended');window.location.href = 'user.php';</script>";

?>