<?php
session_start();
include "hnf.php";
include "dbConnect.php";

if (!isset($_SESSION['username'])) {
    die("You must be logged in to view this page.");
}
$username = $_SESSION['username'];
$q = "SELECT id, itemname, Photo, price FROM cart WHERE username = '$username'";
$resultss = mysqli_query($con, $q);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart2.css">
    <title>Cart</title>
</head>
<body>
    <div class="main-content">
        <div class="title">Cart</div>
        <div class="content">
            <div class="item-list">
                <form method="POST" action="process_checkout.php" id="checkout-form">
                    <?php
                    $num_rows = mysqli_num_rows($resultss);
                    if ($num_rows > 0) {
                        $totalPrice = 0; // Initialize total price
                        while ($row = mysqli_fetch_assoc($resultss)) {
                            $item = $row['itemname'];
                            $price = $row['price'];
                            $id = $row['id'];
                            $photo = $row['Photo'];
                            $totalPrice += $price; // Add price to total
                            echo "<div class='item' data-price='$price'>";
                            echo "<div class='item-id'>ID: $id</div>";
                            echo "<div class='item-name'>Item: $item</div>";
                            echo "<div class='item-price'>Price: रु$price</div>";
                            echo "
                            <div class='item-quantity'>
                                <div class='quantity-container'>
                                    <button type='button' class='decrement'>-</button>
                                    <input type='number' name='quantity[$id]' value='1' min='1' class='quantity-input'>
                                    <button type='button' class='increment'>+</button>
                                </div>
                            </div><br>
                            <input type='hidden' name='id[$id]' value='$id'>
                            <input type='hidden' name='itemname[$id]' value='$item'>
                            <input type='hidden' name='photo[$id]' value='$photo'>";
                            echo "
                            <button type='button' class='cancel-btn' data-id='$id' data-itemname='$item' data-photo='$photo' data-price='$price'>Cancel</button>";
                            echo "</div>";
                        }
                        echo "<p id='total-price'>Total Price: रु$totalPrice</p>"; // Display total price
                        echo "<button id='buy-all-btn' class='buy-all-btn'>Buy All</button>";
                    } else {
                        echo "<p>Your cart is empty.</p>";
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.increment').forEach(button => {
            button.addEventListener('click', () => {
                const input = button.parentElement.querySelector('.quantity-input');
                input.value = parseInt(input.value) + 1;
                updateTotalPrice();
            });
        });

        document.querySelectorAll('.decrement').forEach(button => {
            button.addEventListener('click', () => {
                const input = button.parentElement.querySelector('.quantity-input');
                if (input.value > 1) {
                    input.value = parseInt(input.value) - 1;
                    updateTotalPrice();
                }
            });
        });

        function updateTotalPrice() {
            let totalPrice = 0;
            document.querySelectorAll('.item').forEach(item => {
                const quantity = parseInt(item.querySelector('.quantity-input').value);
                const price = parseFloat(item.getAttribute('data-price'));
                totalPrice += quantity * price;
            });
            document.getElementById('total-price').innerText = "Total Price: $" + totalPrice.toFixed(2);
        }

        document.getElementById('buy-all-btn').addEventListener('click', () => {
            const quantities = document.querySelectorAll('.quantity-input');
            const items = [];
            quantities.forEach(input => {
                const id = input.getAttribute('name').split('[')[1].split(']')[0];
                const quantity = input.value;
                items.push({ id, quantity });
            });
            const itemsInput = document.createElement('input');
            itemsInput.type = 'hidden';
            itemsInput.name = 'items';
            itemsInput.value = JSON.stringify(items);
            document.getElementById('checkout-form').appendChild(itemsInput);
            document.getElementById('checkout-form').submit();
        });

        document.querySelectorAll('.cancel-btn').forEach(button => {
            button.addEventListener('click', () => {
                const id = button.getAttribute('data-id');
                const itemname = button.getAttribute('data-itemname');
                const photo = button.getAttribute('data-photo');
                const price = button.getAttribute('data-price');
                
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = 'cancelcart.php';

                const idInput = document.createElement('input');
                idInput.type = 'hidden';
                idInput.name = 'id';
                idInput.value = id;

                const itemnameInput = document.createElement('input');
                itemnameInput.type = 'hidden';
                itemnameInput.name = 'itemname';
                itemnameInput.value = itemname;

                const photoInput = document.createElement('input');
                photoInput.type = 'hidden';
                photoInput.name = 'photo';
                photoInput.value = photo;

                const priceInput = document.createElement('input');
                priceInput.type = 'hidden';
                priceInput.name = 'price';
                priceInput.value = price;

                form.appendChild(idInput);
                form.appendChild(itemnameInput);
                form.appendChild(photoInput);
                form.appendChild(priceInput);

                document.body.appendChild(form);
                form.submit();
            });
        });
    </script>
</body>

</html>
