<?php
// If there is no session already started
if (session_status() == PHP_SESSION_NONE) {
    // Start a new session
    session_start();
}

echo '<ul>';
if (isset($_SESSION['user_id'])){
    foreach ($_SESSION["cart"] as $productID => $productInfo) {
        echo '<li> 
                <p>' . $productInfo['name'] . ' x ' . $productInfo['quantity'] . ' | '. $productInfo['total_price'] . '€ </p>
            </li>';
    }
}
echo '</ul>';
