<?php
include "dbconnect.php"; // Include the file containing the database connection

// Assuming $con is your database connection

// Sanitize and get values from $_POST
$id = isset($_POST['id']) ? mysqli_real_escape_string($con, $_POST['id']) : '';
$cata = isset($_POST['cata']) ? mysqli_real_escape_string($con, $_POST['cata']) : '';
$cata2 = isset($_POST['cata2']) ? mysqli_real_escape_string($con, $_POST['cata2']) : '';

if ($id !== '' && $cata !== '') {
    // Fetch the current quantity and price from the database
    $qs = "SELECT quantity, price FROM newprod WHERE id = $id";
    $resultp = mysqli_query($con, $qs);

    if ($resultp && mysqli_num_rows($resultp) > 0) {
        $row = mysqli_fetch_assoc($resultp);
        $quantity = $row['quantity'];
        $pri = $row['price'];

        // Calculate the new quantity
        $newQuantity = $quantity + $cata;

        // Determine the query based on whether a new price is provided
        if ($cata2 === '' || $cata2 == 0) {
            $q = "UPDATE `newprod` SET `quantity` = '$newQuantity' WHERE id = $id";
        } else if ($cata === '' || $cata == 0){
            $q = "UPDATE `newprod` SET `price` = '$cata2' WHERE id = $id";
        }
        else {
            $q = "UPDATE `newprod` SET `quantity` = '$newQuantity', `price` = '$cata2' WHERE id = $id";
        }

        // Execute the update query
        if (mysqli_query($con, $q)) {
            echo "<script>alert('Data updated'); window.location.href = 'displayitem.php';</script>";
        } else {
            echo "<script>alert('Error updating data'); window.location.href = 'displayitem.php';</script>";
        }
    } else {
        echo "<script>alert('Product not found'); window.location.href = 'displayitem.php';</script>";
    }
} else {
    echo "<script>alert('Invalid input'); window.location.href = 'displayitem.php';</script>";
}
?>
