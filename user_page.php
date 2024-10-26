<?php
session_start();
include "hnf.php";
include "dbConnect.php";
$new_password_err = $confirm_password_err = "";
$new_password = $confirm_password = "";
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("location: login.html");
    exit;
}
$username = $_SESSION['username'];
$sql = "SELECT * FROM purchases WHERE username = ?";
if ($stmt = $con->prepare($sql)) {
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page - Change Password</title>
    <link rel="stylesheet" href="userpage.css">
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .wrapper {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .help-block {
            color: #ff0000;
            font-size: 14px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-link {
            color: #007bff;
            text-decoration: none;
        }

        .btn-link:hover {
            text-decoration: underline;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

        .btn-green {
            background-color: green;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 4px;
        }

        .btn-green:hover {
            background-color: darkgreen;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h2>Change Password</h2>
        <p>Please fill out this form to change your password.</p>
        <form action="newpass.php" method="post">
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="new_password" class="form-control">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control"></br>
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
        </form>
    </div>

    <!-- Purchase History -->
    <div class="wrapper">
        <h2>Purchase History</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Item Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Date Purchased</th>
                    <th>Invoice</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                while ($row = $result->fetch_assoc()) {
                    $id = $row['id'];
                    echo "<tr>";
                    echo "<td>" . $row['itemname'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['quantity'] . "</td>";
                    echo "<td>" . $row['Date'] . "</td>";
                    echo "<td><a class='btn btn-green' href='Bill.php?id=$id';>Bill</a></td>";
                    echo "</tr>";
                } 
                ?>
            </tbody>
        </table>
    </div>

    <?php
    include "f.php";
    ?>
</body>

</html>
