<?php
session_start();
include("dbconnect.php");

$id = $_GET['id'];

// Corrected SQL query
$q = "SELECT `id`, `username`, `itemname`, `Photo`, `price`, `quantity`, `Date` FROM `purchases` WHERE id = $id";
$result = mysqli_query($con, $q);

// Fetch the result
$row = mysqli_fetch_assoc($result);

// Calculate total price
$total_price = $row['price'] * $row['quantity'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .bill-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 800px;
            width: 100%;
            box-sizing: border-box;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }

        header p {
            margin: 5px 0;
            font-size: 14px;
        }

        .customer-details,
        .item-details {
            margin-bottom: 20px;
        }

        .customer-details h2,
        .item-details h2 {
            margin-bottom: 10px;
            font-size: 18px;
            border-bottom: 2px solid #000;
            padding-bottom: 5px;
        }

        .customer-details p,
        .item-details p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }

        table .item-photo img {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

       
    </style>
</head>
<body>
    <div class="bill-container">
        <header>
            <h1>LOTHRIC</h1>
            <p>Gongabhu, Ktm</p>
            <p>Email: LOTHRIC@gmail.com | Phone: +977-1234567890</p>
        </header>
        <section class="customer-details">
            <p><strong>Username:</strong> <?php echo htmlspecialchars($row['username']); ?></p>
            <p><strong>Purchase Date:</strong> <?php echo htmlspecialchars($row['Date']); ?></p>
        </section>
        <section class="item-details">
            <h2>Items Purchased</h2>
            <table>
                <thead>
                    <tr>
                        <th>Item Photo</th>
                        <th>Item Name</th>
                        <th>Date Purchased</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="item-photo">
                            <a id="imageDownloadLink" href="productimages/<?php echo htmlspecialchars($row['Photo']); ?>" download>
                                <img src="productimages/<?php echo htmlspecialchars($row['Photo']); ?>" alt="<?php echo htmlspecialchars($row['itemname']); ?>">
                            </a>
                        </td>
                        <td><?php echo htmlspecialchars($row['itemname']); ?></td>
                        <td><?php echo htmlspecialchars($row['Date']); ?></td>
                        <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                        <td><?php echo htmlspecialchars($row['price']); ?></td>
                    </tr>
                </tbody>
            </table>
            <table class="total-price">
                <tr>
                    <td><strong>Total Price:</strong></td>
                    <td><?php echo htmlspecialchars($total_price); ?></td>
                </tr>
            </table>
        </section>
        <footer>
            <p>Thank you for your business!</p>
        </footer>
    </div>

    <script>
    // Check if the current page is being viewed or downloaded
    var isDownloaded = window.location.protocol === "data:";

    // If downloaded, remove the download button
    if (isDownloaded) {
        var downloadButton = document.getElementById("downloadButton");
        if (downloadButton) {
            downloadButton.style.display = "none";
        }
    }

    // Add event listener to download button
    document.getElementById("downloadButton").addEventListener("click", function() {
        var filename = "bill.html";
        var element = document.createElement('a');
        element.setAttribute('href', 'data:text/html;charset=utf-8,' + encodeURIComponent(document.documentElement.outerHTML));
        element.setAttribute('download', filename);
        element.style.display = 'none';
        document.body.appendChild(element);
        element.click();
        document.body.removeChild(element);
    });

    // Add event listener to image download link
    document.getElementById("imageDownloadLink").addEventListener("click", function(e) {
        e.preventDefault();
        var imageSrc = this.getAttribute('href');
        var imageFileName = imageSrc.substring(imageSrc.lastIndexOf('/') + 1);
        var imageElement = document.createElement('a');
        imageElement.setAttribute('href', imageSrc);
        imageElement.setAttribute('download', imageFileName);
        imageElement.style.display = 'none';
        document.body.appendChild(imageElement);
        imageElement.click();
        document.body.removeChild(imageElement);
    });
</script>

</body>
</html>
