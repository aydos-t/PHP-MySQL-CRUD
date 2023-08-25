<?php 

require_once 'config/connect.php';

$product_id = $_GET['id'];
$product = mysqli_query($connect, "SELECT * FROM `products` WHERE `id` = '$product_id'");
$product = mysqli_fetch_assoc($product);

$comments = mysqli_query($connect, "SELECT * FROM `comments` WHERE `product_id` = '$product_id'");
$comments = mysqli_fetch_all($comments);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product</title>
</head>
<body>
    <p>Title: <?= $product['title'] ?></p>
    <p>Price: <?= $product['price'] ?></p>
    <p>Description: <?= $product['description'] ?></p>

    <hr>

    <form action="vendor/AddComment.php" method="POST">
        <input type="hidden" name="id" value=" <?= $product['id'] ?>">
        <h3>Add Comments</h3>
        <textarea name="body" id=""></textarea>
        <button type="submit">Add comment</button>
    </form>

    <hr>

    <h3>Comments</h3>
    <ul>
        <?php 
            foreach ($comments as $comment) {
                ?>
                <li><?= $comment[2] ?></li>
                <?php
            }
        ?>
    </ul>

    <a href="show.php"> <-GoBack </a>
</body>
</html>