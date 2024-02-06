<?php

// If there is no session already started
if (session_status() == PHP_SESSION_NONE) {
    // Start a new session
    session_start();
}

if (isset($_SESSION["user_id"])) {

    //Get new values
    $productID = $_GET['productId'];
    $newQuantity = $_GET['quantity'];

    //Update price and total amount
    $oldQuantity = $_SESSION["cart"][$productID]["quantity"];
    $productPrice = $_SESSION["cart"][$productID]["unitary_price"];

    $_SESSION["price"] -= intval($oldQuantity) * intval($productPrice);
    $_SESSION["amount"] -= intval($oldQuantity);

    $_SESSION["price"] += $newQuantity * intval($productPrice);
    $_SESSION["amount"] += $newQuantity;


    //Change quantity on cart
    $_SESSION["cart"][$productID]["quantity"] = $newQuantity;
    $_SESSION["cart"][$productID]["total_price"] = $newQuantity * intval($productPrice);

    include_once __DIR__.'/../model/connectionBD.php';
    include_once __DIR__.'/../model/product.php';

    $productArray = [];

    if (isset($_SESSION["user_id"])) {
        foreach ($_SESSION["cart"] as $productID => $productInfo) {
            $productName = $productInfo['name'];
            $unitaryPrice = $productInfo['unitary_price'];
            $quantity = $productInfo['quantity'];
            $totalPrice = $productInfo['total_price'];
            $reference = $productInfo['reference'];
            $size = $productInfo['size'];

            $connection = connectionBD();
            $productDetails = getProductByRef($connection, $reference);
            $image = $productDetails[0]['image'];

            $productArray[] = [
                'productID' => $productID,
                'name' => $productName,
                'unitaryPrice' => $unitaryPrice,
                'quantity' => $quantity,
                'totalPrice' => $totalPrice,
                'image' => $image,
                'reference' => $reference,
                'size' => $size,
            ];
        }
    }

    $totalQuantity = 0;
    $finalCheckOutPrice = 0;

    foreach ($productArray as $product) {
        $totalQuantity += $product['quantity'];
        $finalCheckOutPrice += $product['totalPrice'];
    }

    include_once __DIR__ . '/../view/shopping_cart.php';

    renderShopppingCart($productArray, $totalQuantity, $finalCheckOutPrice);
    renderShopppingCartSummary($productArray, $totalQuantity, $finalCheckOutPrice);
}