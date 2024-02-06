<?php 
    function getCartMenuHTML() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION["cart"])){ 
            echo '
            <div id="cart-list-menu-items">
                <ul>';
                foreach ($_SESSION["cart"] as $productID => $productInfo) {
                    echo '<li> 
                            <p>' . $productInfo['name'] . ' x ' . $productInfo['quantity'] . ' | '. $productInfo['total_price'] . '€ </p>
                        </li>';
                }
                echo '</ul>
            </div>
            <div id="cart-menu-price">
                <p> Total: '.$_SESSION["price"].'€</p>
            </div>';
        }
    }

    function getTotalQuantityInCart() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    
        $totalQuantity = 0;
    
        if (isset($_SESSION["cart"])) {
            foreach ($_SESSION["cart"] as $productID => $productInfo) {
                $totalQuantity += $productInfo['quantity'];
            }
        }
    
        return $totalQuantity;
    }
    
    function updateBanner(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if(isset($_SESSION["cart"])){
            echo getTotalQuantityInCart();
        }
    }
?>

