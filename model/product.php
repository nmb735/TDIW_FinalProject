<?php
function getProductsByCategory($connection,$category)
{
    $sql = 'SELECT DISTINCT reference, name, image, description, current_price, full_price, discount, category_id FROM "public"."Product" WHERE category_id ='.$category;

    $stmt = $connection->query($sql, \PDO::FETCH_ASSOC);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProductByRef($connection,$productRef)
{
    $sql = 'SELECT DISTINCT reference, name, image, description, current_price, full_price, discount, category_id FROM "public"."Product" WHERE reference = '."'".$productRef."'";

    $stmt = $connection->query($sql, \PDO::FETCH_ASSOC);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProductByID($connection,$productID)
{
    $sql = 'SELECT * FROM "public"."Product" WHERE product_id = '."'".$productID."'";

    $stmt = $connection->query($sql, \PDO::FETCH_ASSOC);

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);    
    
    return $products[0];
}

function getSizesByRef($connection,$productRef)
{
    $sql = 'SELECT DISTINCT product_id, size FROM "public"."Product" WHERE reference = '."'".$productRef."'";

    $stmt = $connection->query($sql, \PDO::FETCH_ASSOC);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProductID($connection,$productRef, $productSize)
{
    $sql = 'SELECT DISTINCT product_id FROM "public"."Product" WHERE reference = '."'".$productRef."'".'AND size ='."'".$productSize."'";

    $stmt = $connection->query($sql, \PDO::FETCH_ASSOC);

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $products[0]['product_id'];
}
