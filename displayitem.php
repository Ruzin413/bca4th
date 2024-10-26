<?php
session_start();
include "hnf.php";
include "dbConnect.php";
$q = "SELECT id, itemname, photo, remarks, price, category, quantity FROM newprod ORDER BY id DESC";
$resultss = mysqli_query($con, $q);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="displayitems.css">
    <title>Main page</title>
</head>
<body>
<div class="main-content">
    <div class="title">Products</div>
    <div class="content">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Photo</th>
                <th>Remark</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Update quantity and price</th>
                <th>Delete</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($resultss, MYSQLI_ASSOC)) {
                $id = $row['id'];
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['itemname'] . "</td>";
                echo "<td><img src='productimages/" . $row['photo'] . "' alt='" . $row['itemname'] . "'></td>";
                echo "<td>" . $row['remarks'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" .$row['quantity']."</td>";
                echo "<td>" . $row['category'] . "</td>";
                echo "<td><a class='btn btn-delete' href='updatestock.php?id=$id'>Update</a></td>";
                echo "<td><a class='btn btn-delete' href='deleteitem.php?id=$id' onclick='return confirm(\"Are you sure to delete?\");'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</div>
<?php include "f.php"; ?>
</body>
</html>
