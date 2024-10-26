<?php
session_start();
include "dbConnect.php";

if (!isset($_SESSION['username'])) {
    die("You must be logged in to perform this action.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and decode items array
    $items = json_decode($_POST['items'], true);
    $usern = $_SESSION['username'];

    foreach ($items as $item) {
        $id = $item['id'];
        $quantity = $item['quantity'];
        $stmt = $con->prepare("SELECT itemname, photo, price FROM cart WHERE id = ? AND username = ?");
        $stmt->bind_param("is", $id, $usern);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        if ($result) {
            
            $stmt_check = $con->prepare("SELECT quantity FROM newprod WHERE itemname = ?");
            $stmt_check->bind_param("s", $result['itemname']);
            $stmt_check->execute();
            $stock_result = $stmt_check->get_result()->fetch_assoc();
            $stmt_check->close();

            if ($stock_result['quantity'] < $quantity) {
                echo "<script>alert('Not enough stock for ".$result['itemname']."');</script>";
                echo "<script>window.location = 'cart.php';</script>"; 
                exit();
            }
            // Insert purchase data into `purchases` table
            $stmt = $con->prepare("INSERT INTO purchases (username, itemname, photo, price, quantity) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssid", $usern, $result['itemname'], $result['photo'], $result['price'], $quantity);
            $stmt->execute();
            $stmt->close();

            // Remove item from cart
            $stmt = $con->prepare("DELETE FROM cart WHERE id = ? AND username = ?");
            $stmt->bind_param("is", $id, $usern);
            $stmt->execute();
            $stmt->close();
            $stmts = $con->prepare("UPDATE newprod SET quantity = quantity - ? WHERE itemname = ?");
            $stmts->bind_param("is", $quantity, $result['itemname']);
            $stmts->execute();
            $stmts->close();
        }
    }

    echo "<script>alert('The products have been bought');</script>";
    header("Location: thank_you.php");
    exit();
} else {
    echo "<script>alert('Invalid request method');</script>";
}
?>
