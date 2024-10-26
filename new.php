<?php
session_start();
include "hnf.php";
include "dbConnect.php";

// Fetch all unique categories
$category_query = "SELECT DISTINCT category FROM category";
$category_results = mysqli_query($con, $category_query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category Pages</title>
    <link rel="stylesheet" href="new.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing+Script">
</head>
<body>
<div class="outer-container">
    <main class="main-content">
        <h1>Category Pages</h1>

        <?php
        // Display each category
        while ($category_row = mysqli_fetch_assoc($category_results)) {
            $category = $category_row['category'];
            echo "<h2>$category</h2>"; // Display the category name

            // Fetch products for this category
            $product_query = "SELECT id, itemname, photo, remarks, price FROM newprod WHERE category = '$category'";
            $product_results = mysqli_query($con, $product_query);

            // Start grid container for this category
            echo '<div class="grid-container">';

            // Display products in grid format
            while ($product_row = mysqli_fetch_assoc($product_results)) {
                echo '<div class="grid-item">';
                echo '<img src="productimages/' . $product_row['photo'] . '" alt="' . $product_row['itemname'] . '">';
                echo '<h3>' . $product_row['itemname'] . '</h3>';
                echo '<p>' . $product_row['remarks'] . '</p>';
                echo '<p class="price">$' . $product_row['price'] . '</p>';
                echo '<button class="buy-now-btn">Buy Now</button>';
                echo '</div>';
            }

            // Close grid container for this category
            echo '</div>';
        }
        ?>

    </main>
</div>

<?php
include "f.php";
?>
</body>
</html>
