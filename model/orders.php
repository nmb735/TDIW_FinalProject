<?php
function setNewOrder($connection, $user_id, $total_price, $total_amount)
{
    try {
        // Get timestamp
        $time_stamp = date("Y-m-d H:i:s");
        
        // Create new order
        // Prepare the SQL statement
        $sql = 'INSERT INTO "public"."Order" ("userID", "totalPrice", "totalAmount", "status", "time") VALUES (:user_id, :total_price, :total_amount, \'submitted\', :time_stamp)';
        $stmt = $connection->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':time_stamp', $time_stamp);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':total_price', $total_price);
        $stmt->bindParam(':total_amount', $total_amount);

        // Execute the prepared statement
        $stmt->execute();
    } catch (PDOException $e) {
        // Handle the exception (e.g., log the error, display a user-friendly message)
        echo 'Error: ' . $e->getMessage();
    }
}



function getOrdersByUser($connection, $user_id)
{
    // Prepare the SQL statement
    $sql = 'SELECT * FROM "public"."Order" WHERE "userID" = :user_id';
    $stmt = $connection->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':user_id', $user_id);

    // Execute the prepared statement
    $stmt->execute();

    // Fetch the result
    $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $orders;
}

function setNewOrderLine($connection, $order_id, $product_id, $amount)
{
    // Create new order
    // Prepare the SQL statement
    $sql = 'INSERT INTO "public"."OrderLine" ("orderID", "productID", amount) VALUES (:order_id , :product_id, :amount)';
    $stmt = $connection->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':order_id', $order_id);
    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':amount', $amount);

    // Execute the prepared statement
    $stmt->execute();
}
 
function getOrderLines($connection, $order_id)
{
    // Prepare the SQL statement
    $sql = 'SELECT DISTINCT * FROM "public"."OrderLine" WHERE "orderID" = :order_id';
    $stmt = $connection->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':order_id', $order_id);

    // Execute the prepared statement
    $stmt->execute();

    // Fetch the result
    $orderLines = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $orderLines;
}