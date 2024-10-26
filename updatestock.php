<?php
session_start();
include ('hnf.php');
include ('dbconnect.php');
$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cat.css">
</head>
<body>
    <form id="stockForm" action="updatestockdb.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <label>Change price and quantity</label>
        <label>Add quantity</label>
        <input type="number" name="cata" id="quantity" min="1">
        <label>Change price</label>
        <input type="number" name="cata2" id="price" min="1">
        <button type="submit">Submit</button>
    </form>

    <script>
        document.getElementById('stockForm').addEventListener('submit', function(event) {
            var quantity = document.getElementById('quantity').value;
            var price = document.getElementById('price').value;

            // Check if the values are empty or positive
            if ((quantity && quantity <= 0) || (price && price <= 0)) {
                alert('Please enter positive numbers for quantity and price if you choose to fill them.');
                event.preventDefault(); // Prevent form submission
            }
        });
    </script>
</body>
</html>
