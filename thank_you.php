
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="thank-you.css">
    <title>Thank You</title>
    
</head>
<body>
    <div class="container">
        <h1>Thank You!</h1>
        <p>Your purchase has been successfully completed.</p>
        <p>Thank you for shopping with us.</p>
        <button onclick="navigateToHome(event)">Go to Home</button>
    </div>

<script>
  function navigateToHome(event) {
    event.preventDefault(); // Prevent the default link behavior

    // Clear the localStorage
    localStorage.removeItem('cart');

    // Navigate to the /home page
    window.location.href = "menu.php";
}
</script>
</body>
</html>
