<?php
    $catag= $_POST["cata"];
    $q="INSERT INTO `category`(`category`) VALUES ('$catag')";
    include ('dbconnect.php');
    $result= mysqli_query($con,$q);
    echo"<script>alert('Data inserted')</script>";
    header("category.php");
?>