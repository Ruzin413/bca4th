<?php
include("dbconnect.php");
$usern = $_POST["username"];
$email = $_POST["email"];
$psd = $_POST["password"];
$cpd = $_POST["password2"];
$AL = "SELECT COUNT(*) AS count FROM `register` WHERE username = '$usern'";
$VAL =  mysqli_query($con,$AL);
$row = mysqli_fetch_assoc($VAL);
if ($row['count'] > 0) {
    echo "<script>
        alert('Username already exists. Please use a different username.');
        window.location.href = 'register.php';
    </script>";
} else {
    if ($psd === $cpd) {
        $stat ="valid";
        $in = "INSERT INTO `register`(`username`, `email`, `password`, `cpassword`,`status`) VALUES ('$usern', '$email', '$psd', '$cpd','$stat')";
        $qu = mysqli_query($con, $in);
        if ($qu) {
            echo "<script>
            alert('User Registered');
            window.location.href = 'register.php';
        </script>";
        } else {
            echo "<script>alert('Error inserting data');</script>";
        }
    } else {
        echo "<script>alert('Passwords do not match');</script>";
    }
}
?>