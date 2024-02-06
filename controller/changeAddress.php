<?php
include_once __DIR__.'/../model/connectionBD.php';
include_once __DIR__.'/../model/product.php';
include_once __DIR__.'/../model/user_session.php';

// If there is no session already started
if (session_status() == PHP_SESSION_NONE) {
    // Start a new session
    session_start();
}

if (isset($_SESSION["user_id"])) {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Get product data
        $newAddress = $_GET['address'] ?? '';
        $_SESSION["address"] = $newAddress;
        // Find product details
        $connection = connectionBD();
        
        changeUserAddress($connection, $_SESSION["user_id"], $newAddress);

        echo $newAddress;
    }
}