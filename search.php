<?php
session_start();
include "hnf.php";
include "dbConnect.php";


$search_query = "";
$search_results = [];


if(isset($_GET['query'])) {
    $search_query = mysqli_real_escape_string($con, $_GET['query']);
    $category_filter = isset($_GET['category']) ? "AND category = '" . mysqli_real_escape_string($con, $_GET['category']) . "'" : "";
    
    $search_item_query = "SELECT id, itemname, photo, remarks, price FROM newprod WHERE itemname LIKE '%$search_query%' $category_filter";
    $search_results = mysqli_query($con, $search_item_query);
}

// Function to display items in a grid
function displayItems($items) {
    echo '<div class="grid-container">';
    while ($row = mysqli_fetch_assoc($items)) {
        $itemname = htmlspecialchars($row['itemname'], ENT_QUOTES, 'UTF-8');
        $price = htmlspecialchars($row['price'], ENT_QUOTES, 'UTF-8');
        $photo = htmlspecialchars($row['photo'], ENT_QUOTES, 'UTF-8');
    
        echo '<div class="grid-item">';
        echo '<img src="productimages/' . $row['photo'] . '" alt="' . $row['itemname'] . '">';
        echo '<h3>' . $row['itemname'] . '</h3>';
        echo '<p>' . $row['remarks'] . '</p>';
        echo '<p class="price">$' . $row['price'] . '</p>';
        echo '<form method="post" action="addtocart.php">';
        echo '<input type="hidden" name="itemname" value="' . $itemname . '">';
        echo '<input type="hidden" name="itemprice" value="' . $price . '">';
        echo '<input type="hidden" name="photo" value="' . $photo . '">';
        echo '<button type="submit" class="buy-now-btn">Add to cart</button>';
        echo '</form>';
        echo '</div>';
    }
    echo '</div>';
}?>    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing Script">
    <link rel="stylesheet" href="search.css">
</head>
<body>

<main>
    <h1>Search for Products</h1>
    <div class="search-container">
        <form action="" method="GET">
            <input type="text" name="query" placeholder="Search...">
            <select name="category">
                <option value="">All Categories</option>
                <?php
                // Fetch categories from the database
                $category_query = "SELECT DISTINCT category FROM newprod";
                $category_results = mysqli_query($con, $category_query);
                while($row = mysqli_fetch_assoc($category_results)) {
                    echo '<option value="' . $row['category'] . '">' . $row['category'] . '</option>';
                }
                ?>
            </select>
            <button type="submit">Search</button>
        </form>
    </div>

    <?php
    // Display search results if available
    if(isset($_GET['query'])) {
        echo '<h2>Search Results</h2>';
        if(mysqli_num_rows($search_results) > 0) {
            displayItems($search_results);
        } else {
            echo '<p>No results found.</p>';
        }
    }
    ?>
</main>

<?php
include "f.php";
?>
<script>
</script>
</body>
</html>