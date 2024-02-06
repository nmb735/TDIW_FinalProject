<?php
include_once __DIR__.'/../model/connectionBD.php';
include_once __DIR__.'/../model/product.php';

// If there is no session already started
if (session_status() == PHP_SESSION_NONE) {
    // Start a new session
    session_start();
}

if (isset($_SESSION["user_id"])) {
    include_once __DIR__ . '/../view/cart_menu.php';
    updateBanner();
}
