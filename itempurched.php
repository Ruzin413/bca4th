<?php
// Include database connection file
include "dbConnect.php";

// SQL query to fetch user purchases
$query = "SELECT * FROM `purchases` WHERE username = '{$_SESSION['username']}'";
$result = mysqli_query($con, $query);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {
    // Output table header
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>";

    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["itemname"] . "</td>";
        echo "<td>" . $row["price"] . "</td>";
        echo "<td>" . $row["quantity"] . "</td>";
        echo "</tr>";
    }

    // Close the table
    echo "</table>";
} else {
    // Output message if no results
    echo "No purchases found.";
}

// Close the connection
mysqli_close($con);
?>