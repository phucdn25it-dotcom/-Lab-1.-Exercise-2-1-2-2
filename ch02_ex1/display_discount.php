<?php

$product_description = filter_input(
    INPUT_POST,
    'product_description'
);

$list_price = filter_input(
    INPUT_POST,
    'list_price',
    FILTER_VALIDATE_FLOAT
);

$discount_percent = filter_input(
    INPUT_POST,
    'discount_percent',
    FILTER_VALIDATE_FLOAT
);

$discount = $list_price * $discount_percent * 0.01;

$discount_price = $list_price - $discount;

$list_price_formatted = "$" . number_format($list_price, 2);

$discount_percent_formatted =
    number_format($discount_percent, 1) . "%";

$discount_formatted =
    "$" . number_format($discount, 2);

$discount_price_formatted =
    "$" . number_format($discount_price, 2);

$product_description_escaped =
    htmlspecialchars($product_description);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product Discount Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<main>

    <h1>Product Discount Calculator</h1>

    <label>Product Description:</label>
    <span>
        <?php echo $product_description_escaped; ?>
    </span>
    <br>

    <label>List Price:</label>
    <span>
        <?php echo $list_price_formatted; ?>
    </span>
    <br>

    <label>Standard Discount:</label>
    <span>
        <?php echo $discount_percent_formatted; ?>
    </span>
    <br>

    <label>Discount Amount:</label>
    <span>
        <?php echo $discount_formatted; ?>
    </span>
    <br>

    <label>Discount Price:</label>
    <span>
        <?php echo $discount_price_formatted; ?>
    </span>
    <br>

</main>

</body>
</html>