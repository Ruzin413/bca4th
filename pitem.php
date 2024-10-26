<?php
session_start();
include "hnf.php";
include "dbConnect.php";
$q = "SELECT * FROM purchases";
$resultss = mysqli_query($con, $q);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="piteam.css">
    <title>Main page</title>
</head>
<body>
<div class="main-content">
    <div class="title">Purchases</div>
    <div class="content">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>user</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>date purchased</th>
                <th>Cancel order</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($resultss, MYSQLI_ASSOC)) {
                $id = $row['id'];
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['itemname'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['quantity'] . "</td>";
                echo "<td>" . $row['Date'] . "</td>";
                echo "<td><a class='btn btn-delete' href='Cancelorder.php?id=$id' onclick='return confirm(\"Are you sure to delete?\");'>Cancel</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</div>
<?php include "f.php"; ?>
</body>
</html>
