<?php
/*
     * Connecting the file to get a connection to the database (NavicatPremium, MySQL)
     */

require_once 'config/connect.php';

/*
     * Get the product ID from the address bar - /product.php?id=1
     */

$product_id = $_GET['id'];

/*
     * Making a selection of the row with the received ID above
     */

$product = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$product_id'");

/*
     * Converting the received data into a normal array
     * Using the mysqli_fetch_assoc function, the array will have keys equal to the column names in the table
     */

$product = mysqli_fetch_assoc($product);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Product</title>
</head>
<body>
    <h3>Update product</h3>
    <form action="vendor/update.php" method="post">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <p>Title</p>
        <input type="text" name="title" value="<?= $product['title'] ?>">
        <p>Description</p>
        <textarea name="description"> <?= $product['title'] ?> </textarea>
        <p>Price</p>
        <input type="number" name="price" value="<?= $product['price'] ?>"> <br/> <br/>
        <button type="submit">Update</button>
    </form>
</body>
</html>