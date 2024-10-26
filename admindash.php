<?php
session_start();
include "hnf.php";
include "dbConnect.php";
if ($_SESSION['username']!= "admin") {
    die("Only admin is allowed to  view this page.");
}
$q = "SELECT COUNT(id) AS total_rows FROM newprod";
$result = mysqli_query($con, $q);
$row = mysqli_fetch_assoc($result);
$total_rows = $row['total_rows'];
$q = "SELECT COUNT(id) AS totals_rows FROM register";
$result = mysqli_query($con, $q);
$row = mysqli_fetch_assoc($result);
$totals_rows = $row['totals_rows'];
$tot = $totals_rows-1;
$q = "SELECT COUNT(id) AS totalss_rows FROM purchases";
$result = mysqli_query($con, $q);
$row = mysqli_fetch_assoc($result);
$totalss_rows = $row['totalss_rows'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admindash</title>
    <!-- <link rel="stylesheet" href="menu.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing Script">
    <style>
    .hero-section {
        position: relative;
        text-align: center;
    }
    .hero-image {
        width: 100%;
        height: auto;
    }
    .hero-image img {
        width: 100%;
        height: auto;
    }

    .dashboard {
        margin-top: 20px;
        display: flex;
        justify-content: space-around;
        padding: 20px;
        position: absolute;
        top: 25%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80%;
        background-color: transparent; /* Transparent background */
        box-shadow: none; /* No shadow */
        border-radius: 5px; /* Optional: Rounded corners */
    }
    .dashboard .card {
        padding: 40px; /* Increase padding to make cards bigger */
        width: 30%;
        text-align: center;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9; /* Ensure solid background color */
        color: green; /* Updated font color */
        margin: 0 10px; /* Add margin between the cards */
        background-size: cover;
        background-position: center;
        font-weight: bold; /* Make the font bold */
    }
    .dashboard .card:nth-child(1) {
        background-color: aqua;
        
    }
    .dashboard .card:nth-child(2) {
        background-color: lightgreen;
    }
    .dashboard .card:nth-child(3) {
        background-color: salmon;
    }
    .dashboard .card h3 {
        margin-bottom: 10px;
        font-size: 24px;
    }
    .dashboard .card p {
        font-size: 18px;
    }
</style>

</head>
<body>
<main>
<section class="hero-section">
    <div class="hero-image">
        <img src="./Img/hero.jpg" alt="Hero Image">
     
        <div class="dashboard">
            <div class="card">
                <h3>Number of Products</h3>
              <?php echo "<p>"; echo  $total_rows; echo"</p>"?>
            </div>
            <div class="card">
                <h3>Number of Users</h3>
                <?php echo "<p>"; echo  $tot; echo"</p>"?>
            </div>
            <div class="card">
                <h3>Number of Purchases</h3>
                <?php echo "<p>"; echo  $totalss_rows; echo"</p>"?>
            </div>
        </div>
    </div>
</section>
</main>
</body>
</html>
