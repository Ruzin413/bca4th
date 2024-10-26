<?php
session_start();
include "dbConnect.php";

if (!isset($_SESSION['username'])) {
    echo "<script>alert('Please login to add items to cart'); window.location.href = 'login.php'; </script>";
    exit();
}

$itemname = $_POST['itemname'];
$price = $_POST['itemprice'];
$photo = $_POST['photo'];
$user = $_SESSION['username'];

$stmt = $con->prepare("INSERT INTO cart (username, itemname, price, photo) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssds", $user, $itemname, $price, $photo);

if ($stmt->execute()) {
    echo "<script>
            alert('Data Added into cart');
            window.location.href = 'menu.php';
          </script>";
} else {
    echo "<script>
            alert('Failed to insert data');
            window.location.href = 'menu.php';
          </script>";
}

$stmt->close();
$con->close();
?>
