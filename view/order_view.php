<?php 
function renderOrder($order, $orderLines, $orderProducts){
    // If there is no session already started
    if (session_status() == PHP_SESSION_NONE) {
        // Start a new session
        session_start();
    }
    // If there is no session already started
    if (isset($_SESSION['user_id'])) {
        ?>
        <div class="data-container">
            <h3 class="user-info-header">Order #<?php echo $order['orderID']; ?> (<?php echo $order['totalPrice']; ?>)</h3>
            <p><?php echo $order['time']; ?></p>
            <div class="current-data">
                <ul>
                    <?php foreach ($orderLines as $orderLine): ?>
                        <?php
                            $productID = $orderLine['productID'];
                            $product = $orderProducts[$productID];
                            $totalPrice = intval($product['current_price']) * $orderLine['amount'];
                        ?>
                        <li>
                            <p><?php echo $product['name']; ?> (<?php echo $product['reference']; ?>) - '<?php echo $product['size']; ?>' x <?php echo $orderLine['amount']; ?> | <?php echo $totalPrice;?>€</p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <?php
    }
}
?>


