<?php

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){ 
    session_start();
    $user = $_POST["usernames"];
    $pass = $_POST["passwords"];
    $_SESSION['loggedin'] = false;
    include('dbconnect.php');
    $q = "SELECT * FROM `register` WHERE username='$user' AND password='$pass'";
    $result= mysqli_query($con,$q);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $stat = $row['status'] ;
    if($result->num_rows == 1) {
        if($stat!=='valid'){
            echo "<script>alert('you are suspended'); window.location.href = 'login.php';</script>";
        }
        else{
            $_SESSION['loggedin'] = True;
            $_SESSION['username'] = $user;
            $_SESSION['password'] = $pass;
            If($_SESSION['username']== "admin" || $_SESSION['username']== "Admin"){
                header("location: admindash.php");
            }
            else{
                header("location: menu.php");
            }
        }
    } else {
        echo "<script>alert('No credentials found'); window.location.href = 'login.php';</script>";
        session_destroy();
    }
}
else{
    header("location: menu.php");
    exit;
}
?>
