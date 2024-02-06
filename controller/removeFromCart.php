<?php
include_once __DIR__.'/../model/connectionBD.php';
include_once __DIR__.'/../model/product.php';

// If there is no session already started
if (session_status() == PHP_SESSION_NONE) {
    // Start a new session
    session_start();
}

$productArray = [];

if (isset($_SESSION["user_id"])) {

    $product_id = $_GET['product_id'];

    if(array_key_exists($product_id, $_SESSION["cart"]))
    {
        $_SESSION["price"] -= $_SESSION["cart"][$product_id]["unitary_price"]*$_SESSION["cart"][$product_id]["quantity"];
        $_SESSION["amount"] -= $_SESSION["cart"][$product_id]["quantity"];
        unset($_SESSION["cart"][$product_id]);
    }
    

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