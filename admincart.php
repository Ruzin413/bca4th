<?php
session_start();
include "hnf.php";
include "dbConnect.php";
$usern = $_SESSION['username'];
$q = "SELECT `id`, `username`, `itemname`, `price` FROM `cart` ";
$resultss = mysqli_query($con, $q);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing Script">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-xyk5C4/Ub+kQ/v97h+1gTZfhQm86wkVzCN+2Booqz4r4a7UBKUB7PEeyKwe0cCMk" crossorigin="anonymous">
</head>

<body>
   
    <main>
    <table border="1" class="display_table">
            <tr>
                <th>user</th>
                <th>itemname</th>
                <th>price</th>
                <th>delete</th>
            </tr>
    <?php
    $count = 0 ;
            while($row = mysqli_fetch_array($resultss, MYSQLI_ASSOC)) {
                $count=$count+1;
                echo "<tr>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['itemname'] . "</td>";
                echo "<td>" . $row['price'] . "</td>"; 
                echo "<td>" . $count . "</td>"; 
                echo "<td><a class='btn' href='deleteitem.php? id=$id' onclick='return confirm(\"Are you sure to delete?\");'>Delete</a></td>";
                echo "</tr>";
            }
            ?>

    </main>

    <!-- <footer>
        <div class="footer">
            <div class="socialIcons">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-google"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </div>
            <div class="footerNav">
                <ul>
                    <li>
                        <a href="login.html">Login</a>
                    </li>
                    <li>
                        <a href="cart.html"> Cart </a>
                    </li>
                    <li>
                        <a href="#"> About </a>
                    </li>
                    <li>
                        <a href="shop.html"> Shop</a>
                    </li>
                    <li>
                        <a href="index.html"> Home </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footerBottom">
            <p>Copyright &copy;2024:Designed by <span class="designer"> Ruzin & Samip </span></p>
        </div>
    </footer> -->
  <!-- <script>
     document.addEventListener('DOMContentLoaded', function () {
    displayCartItems();
});

function addToCart(itemName, itemPrice) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const existingItemIndex = cart.findIndex(item => item.name === itemName);
    if (existingItemIndex !== -1) {
        cart[existingItemIndex].quantity++;
    } else {
        cart.push({ name: itemName, price: itemPrice, quantity: 1 });
    }
    localStorage.setItem('cart', JSON.stringify(cart));
    displayCartItems();
}

function changeQuantity(index, change) {
    let cartItems = JSON.parse(localStorage.getItem('cart')) || [];
    cartItems[index].quantity += change;
    if (cartItems[index].quantity < 1) {
        cartItems.splice(index, 1);
    }
    localStorage.setItem('cart', JSON.stringify(cartItems));
    displayCartItems();
}

function removeFromCart(index) {
    let cartItems = JSON.parse(localStorage.getItem('cart')) || [];
    cartItems.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(cartItems));
    displayCartItems();
}

function displayCartItems() {
    const cartItemsContainer = document.getElementById('cart-items');
    cartItemsContainer.innerHTML = '';

    let cartItems = JSON.parse(localStorage.getItem('cart')) || [];
    cartItems.forEach(function (item, index) {
        const cartItemHTML = `
            <div class="cart-item">
                <span class="item-name">${item.name}</span>
                <div class="quantity-control">
                    <button class="quantity-btn minus" onclick="changeQuantity(${index}, -1)">-</button>
                    <span class="item-quantity">${item.quantity}</span>
                    <button class="quantity-btn plus" onclick="changeQuantity(${index}, 1)">+</button>
                </div>
                <div class="item-price">$${(item.price * item.quantity).toFixed(2)}</div>
                <button onclick="removeFromCart(${index})">Remove</button>
            </div>
        `;
        cartItemsContainer.innerHTML += cartItemHTML;
    });

    let totalPrice = cartItems.reduce((total, item) => total + item.price * item.quantity, 0);
    const totalPriceHTML = `<div class="total-price">Total: $${totalPrice.toFixed(2)}</div>`;
    cartItemsContainer.innerHTML += totalPriceHTML;
}
function showSidebar() {
    document.querySelector('.sidebar').style.right = '0';
}

function hideSidebar() {
    document.querySelector('.sidebar').style.right = '-250px';
}
</script> -->

</body>

</html>