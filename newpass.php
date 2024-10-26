<?php
session_start();
include "dbconnect.php";

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    echo "<script>alert('You are not logged in.');window.location.href = 'login_page.php';</script>";
    exit;
}

$users = $_SESSION['username'];
$psd = $_POST['new_password'];
$cpsd = $_POST['confirm_password'];

// Check if new password and confirm password match
if ($psd === $cpsd) {
    // Prepare and execute the update statement
    $q = "UPDATE `register` SET `Password` = ? WHERE `username` = ?";
    $stmt = $con->prepare($q);
    $stmt->bind_param("ss", $psd, $users);
    
    if ($stmt->execute()) {
        echo "<script>alert('Password changed successfully');window.location.href = 'user_page.php';</script>";
    } else {
        echo "<script>alert('Error changing password');window.location.href = 'user_page.php';</script>";
    }
} else {
    echo "<script>alert('Passwords do not match');window.location.href = 'user_page.php';</script>";
}
?>
