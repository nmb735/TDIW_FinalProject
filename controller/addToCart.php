<?php
include_once __DIR__.'/../model/connectionBD.php';
include_once __DIR__.'/../model/product.php';

// If there is no session already started
if (session_status() == PHP_SESSION_NONE) {
    // Start a new session
    session_start();
}

if (isset($_SESSION["user_id"])) {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Get product data
        $productRef = $_GET['reference'] ?? '';
        $quantity = $_GET['quantity'] ?? 0;
        $productSize = $_GET['selectedSize'] ?? '';
        $price = $_GET['price'] ?? 0;

        // Find product details
        $connection = connectionBD();
        $productID = getProductID($connection, $productRef, $productSize);
        $productDetails = getProductByRef($connection, $productRef);

        // Extract information
        $productName = $productDetails[0]['name'];
        $unitaryPrice = $productDetails[0]['current_price'];
        $unitaryPrice = intval($unitaryPrice);
        $totalPrice = $unitaryPrice * $quantity;

        if (!isset($_SESSION["cart"][$productID])) {
            // Add to cart from scratch
            $_SESSION["cart"][$productID] = [
                'name' => $productName,
                'unitary_price' => $unitaryPrice,
                'quantity' => $quantity,
                'total_price' => $totalPrice,
                'reference' => $productRef,
                'size' => $productSize,
            ];
        } else {
            // Update existing item in cart
            $_SESSION["cart"][$productID]['quantity'] += $quantity;
            $_SESSION["cart"][$productID]['total_price'] += $unitaryPrice * $quantity;
        }

        // Update total cart price and amount
        $_SESSION["price"] += ($price * $quantity);
        $_SESSION["amount"] += $quantity;
    }

    include_once __DIR__ . '/../view/cart_menu.php';
    getCartMenuHTML();
}
