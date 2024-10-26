<?php
session_start();
include "hnf.php";
include "dbConnect.php";
$q = "SELECT category FROM category";
$result = mysqli_query($con, $q);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add-product.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing Script">
    <title>Add Product</title>
</head>
<body>
<div class="main-content">
  <form action="addproddb.php" method="post" id="addProductForm">
   <div class="title">Add Product</div><br>
     <div class="content">
     <label> Item Name</label>
     <input type="text" id="itemName" name="itemName" required><br>

     <label> Price</label>
     <input type="number" id="price" name="price" required><br>
     <label>Quantity</label>
     <input type="number" id="Quantity" name="Quantity" required><br>
     <label>Photo</label>
     <input type="file"  id="photo" name="photo"><br>
     

     <label for="category">Category:</label>
      <select name="category" id="category">
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <option value="<?= htmlspecialchars($row['category']) ?>"><?= htmlspecialchars($row['category']) ?></option>
        <?php endwhile; ?>
      </select><br>

       <label> Remarks</label>
     <textarea rows="3" cols="50" id="remarks" name="remarks"></textarea><br>
     <a href="category.php">Add a new category</a>
     <input type="submit" class="btn success">
    
    </div>
    </form>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
  const priceInput = document.getElementById("price");
  const quantityInput = document.getElementById("Quantity");

  // Function to validate price and quantity
  function validateInput(input, minValue) {
    const value = parseFloat(input.value);
    if (isNaN(value) || value < minValue) {
      input.setCustomValidity(`Value must be a number greater than or equal to ${minValue}`);
    } else {
      input.setCustomValidity('');
    }
  }

  // Event listeners for input fields
  priceInput.addEventListener("input", function() {
    validateInput(priceInput, 0);
  });

  quantityInput.addEventListener("input", function() {
    validateInput(quantityInput, 0);
  });
});
</script>
</body>
<?php
include "f.php";
?>
</html>
