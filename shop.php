<?php
session_start();
include "hnf.php";
include "dbConnect.php";

// Check if database connection is successful
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Initialize products by category array
$products_by_category = [];

// Fetch product data from the database
$product_query = "SELECT id, itemname, photo, remarks, price, category, quantity FROM newprod";
$product_results = mysqli_query($con, $product_query);

// Check if product data is fetched successfully
if ($product_results) {
    // Process product data and store it in the products by category array
    while ($product = mysqli_fetch_assoc($product_results)) {
        $category = $product['category'];
        if (!isset($products_by_category[$category])) {
            $products_by_category[$category] = [];
        }
        $products_by_category[$category][] = $product;
    }
} else {
    echo "Error fetching product data: " . mysqli_error($con);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop
    </title>
    <link rel="stylesheet" href="shoo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing+Script">
</head>
<body>
<div class="outer-container">
<main class="main-content">

    <h1>Lothric PC</h1>
    <div class="search-container">
    <form action="search.php" method="GET">
        <input type="text" name="query" placeholder="Search...">
        <button type="submit">Search</button>
    </form>
</div>

<?php
    // Display each category and its corresponding products
    foreach ($products_by_category as $category => $products) {
        echo "<h2>$category</h2>"; // Display the category name

        // Start a scrollable wrapper for the product cards
        echo '<div class="scroll-wrapper">';
        echo '<button class="scroll-btn prev-btn" onclick="scrollLeft(this)">&#8249;</button>';
        echo '<div class="allcards">';

        foreach ($products as $product) {
            echo '<div class="cards">';
            echo '<div class="image">';
            echo '<img src="productimages/' . htmlspecialchars($product['photo']) . '" width="100" height="100">';
            echo '</div>';
            echo '<div class="title">';
            echo '<h2>' . htmlspecialchars($product['itemname']) . '</h2>';
            echo '</div>';
            echo '<div class="des">';
            if($product['quantity']==0){
                echo '<p class="price">Out of Stock</p>';
            }else{
                echo '<p class="price">In Stock :' . htmlspecialchars($product['quantity']) . '</p>';
            } 
            echo '<p>' . htmlspecialchars($product['remarks']) . '</p>';
            echo '<p class="price">रु' . htmlspecialchars($product['price']) . '</p>';
            echo '<form method="POST" action="addtocart2.php">';
            echo '<input type="hidden" name="photo" value="' . htmlspecialchars($product['photo']) . '">';
            echo '<input type="hidden" name="itemname" value="' . htmlspecialchars($product['itemname']) . '">';
            echo '<input type="hidden" name="itemprice" value="' . htmlspecialchars($product['price']) . '">';
            if($product['quantity']==0){
            }else{
                echo '<button class="buy-now-btn" type="submit" name="addToCart">Add to cart</button>';
            } 
            echo '</form>';
            echo '</div>';
            echo '</div>';
        }

        echo '</div>'; // Close "allcards"
        echo '<button class="scroll-btn next-btn" onclick="scrollRight(this)">&#8250;</button>';
        echo '</div>'; // Close "scroll-wrapper"
    }
?>
</main>
</div>

<?php
include "f.php";
?>

<script>
function scrollLeft(button) {
    const scrollWrapper = button.parentElement;
    const allCards = scrollWrapper.querySelector('.allcards');
    allCards.scrollBy({
        left: -300, // Adjust the scroll distance as needed
        behavior: 'smooth'
    });
}

function scrollRight(button) {
    const scrollWrapper = button.parentElement;
    const allCards = scrollWrapper.querySelector('.allcards');
    allCards.scrollBy({
        left: 300, // Adjust the scroll distance as needed
        behavior: 'smooth'
    });
}
</script>
</body>
</html>
