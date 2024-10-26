<?php
session_start();
include "hnf.php";
if ($_SESSION['username'] != "admin") {
    die("Only admin can access this page");
}
include "dbConnect.php";
$ad = "admin";
$q = "SELECT id, username, password, email, status FROM register WHERE username != '$ad'";
$result = mysqli_query($con, $q);

if (!$result) {
    die("Error: " . mysqli_error($con));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User page</title>
    <link rel="stylesheet" href="usermange.css">
</head>
<body>
<div class="main-content">
    <div class="title">Users</div>
    <div class="content">
        <table border="1" class="table">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Change Status</th>
                <th>Remove User</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $id = $row['id'];
                $statu = $row['status'];
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['password'] . "</td>";
                if ($statu == "valid") {
                    echo "<td><a class='btn btn-suspend' href='suspenduser.php?id=$id' onclick='return confirm(\"Are you sure you meant to suspend this user?\");'>Suspend</a></td>";
                } else {
                    echo "<td><a class='btn btn-unsuspend' href='unsuspenduser.php?id=$id' onclick='return confirm(\"Are you sure you meant to unsuspend this user?\");'>Unsuspend</a></td>";
                }
                echo "<td><a class='btn btn-delete' href='deleteuser.php?id=$id' onclick='return confirm(\"Are you sure to delete?\");'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>
