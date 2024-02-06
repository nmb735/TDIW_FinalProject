<?php

    include_once __DIR__.'/../model/user_session.php';
    include_once __DIR__.'/../model/connectionBD.php';
    include_once __DIR__.'/../model/orders.php';

    if (session_status() == PHP_SESSION_NONE) {
        // Start a new session
        session_start();
    }

    $connection = connectionBD();

    if(isset($_SESSION['user_id'])){
        $emptyCart = 0;
        if(count($_SESSION['cart'])!= 0)
        {
            $userID = $_SESSION['user_id'];
            $name = getUserName($connection,$userID);
            $userName = $name[0]['username'];
            setNewOrder($connection, $_SESSION['user_id'], $_SESSION["price"], $_SESSION["amount"]);
            $orders = getOrdersByUser($connection, $_SESSION['user_id']);
            $lastOrder = $orders[count($orders) - 1];     
            foreach ($_SESSION["cart"] as $product_id => $product_info) {
                setNewOrderLine($connection, $lastOrder['orderID'], $product_id, $product_info['quantity']);
            }
        }
        else
        {
            $emptyCart = 1;
        }
               
        $_SESSION["cart"] = [];
        $_SESSION["price"]= 0;
        $_SESSION["amount"]= 0;

    }
    else{
        $name = '';
    }

    

    include_once __DIR__.'/../view/confirmation.php';

    printConfirmationMessage($userName, $emptyCart);

?>