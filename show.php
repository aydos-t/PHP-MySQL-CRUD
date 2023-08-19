<?php
error_reporting(E_ALL);

require_once 'connect.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
</head>
<style>
    th, td {
        padding: 10px;
    }

    th {
        background: #606060;
        color: #fff;
    }

    td {
        background: #b5b5b5;
    }
</style>

<body>
<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Price</th>
        <th>Description</th>
    </tr>

    <?php
        $products = mysqli_query($connect, "SELECT * FROM `products`");
        $products = mysqli_fetch_all($products);
        foreach ($products as $product) {
            ?>
            <tr>
                <td><?= $product[0] ?></td>
                <td><?= $product[1] ?></td>
                <td><?= '$' . $product[2] ?></td>
                <td><?= $product[3] ?></td>
            </tr>
            <?php
        }
    ?>
</table>
</body>
</html>