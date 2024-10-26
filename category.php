<?php
session_start();
include ('hnf.php');
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
    <form action="categorydb.php" method="post">
        <label>input a new category</label>
        <input type="textbox" name="cata">
        <button type="submit">submit</button>
    </form>
</body>
</html>
