<?php
include_once __DIR__.'/../model/connectionBD.php';
include_once __DIR__.'/../model/product.php';
include_once __DIR__.'/../model/user_session.php';
include_once __DIR__.'/../model/orders.php';


// If there is no session already started
if (session_status() == PHP_SESSION_NONE) {
    // Start a new session
    session_start();
}

if (isset($_SESSION["user_id"])) {

    $connection = connectionBD();
    $orders = getOrdersByUser($connection, $_SESSION["user_id"]);

    
    include_once __DIR__.'/../view/order_view.php';
    foreach($orders as $order)
    {
        $orderLines = getOrderLines($connection, $order['orderID']);

        $orderProducts = [];
        foreach($orderLines as $orderLine)
        {
            $orderProducts[$orderLine['productID']] = getProductByID($connection,$orderLine['productID']);
        }
        renderOrder($order, $orderLines, $orderProducts);
    }
    
}