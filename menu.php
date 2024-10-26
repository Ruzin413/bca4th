<?php
session_start();
include "hnf.php";
include "dbConnect.php";

$random_product_query = "SELECT id, itemname, photo, remarks, price, quantity FROM newprod WHERE quantity != 0  ORDER BY RAND() LIMIT 3";
$random_product_results = mysqli_query($con, $random_product_query);

$latest_product_query = "SELECT id, itemname, photo, remarks, price, quantity FROM newprod WHERE quantity != 0 ORDER BY id DESC LIMIT 3";
$latest_product_results = mysqli_query($con, $latest_product_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing Script">
</head>
<body>
<main>
<section class="hero-section">
    <div class="hero-image">
        <img src="./Img/hero.jpg" alt="Hero Image">
        <div class="search-container">
            <form action="search.php" method="GET">
                <input type="text" name="query" placeholder="Search...">
                <button type="submit">Search</button>
            </form>
        </div>
    </div>
</section>

<div class="container">
    <div class="wholebody">
        <h1>Feature Products</h1>
        <div class="allcards">
            <?php while($row = mysqli_fetch_array($random_product_results, MYSQLI_ASSOC)): ?>
                <div class="cards">
                    <div class="image">
                        <img src="productimages/<?php echo htmlspecialchars($row['photo']); ?>" width="100" height="100">
                    </div>
                    <div class="title">
                        <h2><?php echo htmlspecialchars($row['itemname']); ?></h2><br>
                    </div>
                    <div class="des">
                    <p class="Price">In Stock :<?php echo htmlspecialchars($row['quantity']); ?></p>
                        <p><?php echo htmlspecialchars($row['remarks']); ?></p>
                        <p class="price">रु<?php echo htmlspecialchars($row['price']); ?></p>
                        <form action ="addtocart.php" method="post">
                            <input type="hidden" name="photo" value="<?php echo htmlspecialchars($row['photo']); ?>">
                            <input type="hidden" name="itemname" value="<?php echo htmlspecialchars($row['itemname']); ?>">
                            <input type="hidden" name="itemprice" value="<?php echo htmlspecialchars($row['price']); ?>">
                            <input type="hidden" name="quantity" value="<?php echo htmlspecialchars($row['quantity']); ?>">
                            <button class="buy-now-btn" type="submit" name="addToCart">Add to cart</button>
                        </form>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="latestp">
            <h1>Latest Products</h1>
            <div class="allcards">
                <?php while($row = mysqli_fetch_array($latest_product_results, MYSQLI_ASSOC)): ?>
                    <div class="cards">
                        <div class="image">
                            <img src="productimages/<?php echo htmlspecialchars($row['photo']); ?>" width="100" height="100">
                        </div>
                        <div class="title">
                            <h2><?php echo htmlspecialchars($row['itemname']); ?></h2>
                        </div>
                        <div class="des">
                        <p class="qu">In Stock :<?php echo htmlspecialchars($row['quantity']); ?></p>
                            <p><?php echo htmlspecialchars($row['remarks']); ?></p>
                            <p class="price">रु<?php echo htmlspecialchars($row['price']); ?></p>
                            <form action ="addtocart.php" method="post">
                                <input type="hidden" name="photo" value="<?php echo htmlspecialchars($row['photo']); ?>">
                                <input type="hidden" name="itemname" value="<?php echo htmlspecialchars($row['itemname']); ?>">
                                <input type="hidden" name="itemprice" value="<?php echo htmlspecialchars($row['price']); ?>">
                                <button class="buy-now-btn" type="submit" name="addToCart">Add to cart</button>
                            </form>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
</main>
<div class="grid-container">
  <div class="grid-item item1">
    <a href="search.php?query=&category=Keyboard"><img src="./productimages/keymain.jpg" alt="Image 1" width="200" height="200"></a>
    <div class="text">Keyboard</div>
  </div>
  <div class="grid-item item2">
    <a href="search.php?query=&category=CPU"><img src="./productimages/cpumain.jpg" alt="Image 2" width="200" height="200"></a>
    <div class="text">CPU</div>
  </div>
  <div class="grid-item item3">
    <a href="search.php?query=&category=GPU"><img src="./productimages/gpumain.jpg" alt="Image 3" width="200" height="200"></a>
    <div class="text">GPU</div>
  </div>  
  <div class="grid-item item4">
    <a href="search.php?query=&category=Mouse"><img src="./productimages/mousemain.jpg" alt="Image 4" width="200" height="200"></a>
    <div class="text">Mouse</div>
  </div>
  <div class="grid-item item5">
    <a href="search.php?query=&category=PC+Case"><img src="./productimages/casemain.jpg" alt="Image 5" width="200" height="200"></a>
    <div class="text">PC Case</div>
  </div>
  <div class="grid-item item6">
    <a href="search.php?query=&category=RAM"><img src="./productimages/rammain.jpg" alt="Image 6" width="200" height="200"></a>
    <div class="text">RAM</div>
  </div>
</div>

<?php include "f.php"; ?>

<script>
</script>

</body>
</html>

