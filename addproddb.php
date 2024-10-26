<?php
include("dbconnect.php");

// Sanitize and get values from $_POST
$itemname = mysqli_real_escape_string($con, $_POST["itemName"]);
$photo = mysqli_real_escape_string($con, $_POST["photo"]);
$qut = mysqli_real_escape_string($con, $_POST["Quantity"]);
$price = mysqli_real_escape_string($con, $_POST["price"]);
$remark = mysqli_real_escape_string($con, $_POST["remarks"]);
$catag = mysqli_real_escape_string($con, $_POST["category"]);

// Check if the item already exists in the database
$checkQuery = "SELECT id FROM newprod WHERE itemname = '$itemname'";
$checkResult = mysqli_query($con, $checkQuery);

if (mysqli_num_rows($checkResult) == 0) {
    // Item does not exist, proceed with insertion
    $insertQuery = "INSERT INTO `newprod` (`itemname`, `photo`, `remarks`, `price`, `category`, `quantity`) VALUES ('$itemname', '$photo', '$remark', '$price', '$catag', '$qut')";
    if (mysqli_query($con, $insertQuery)) {
        echo "<script>alert('Data inserted');window.location.href = 'addproduct.php';</script>";
    } else {
        echo "<script>alert('Error inserting data');window.location.href = 'addproduct.php';</script>";
    }
} else {
    // Item already exists
    echo "<script>alert('Item already exists');window.location.href = 'addproduct.php';</script>";
}
?>
