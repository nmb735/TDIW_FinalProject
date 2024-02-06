<?php

function getCategories($connection)
{
    $sql = 'SELECT * from "public"."Category"';

    $stmt = $connection->query($sql, \PDO::FETCH_ASSOC);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCategoryByID($connection,$category)
{
    $sql = 'SELECT * FROM "public"."Category" WHERE category_id='.$category;

    $stmt = $connection->query($sql, \PDO::FETCH_ASSOC);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCategoryDescription($connection,$category)
{
    $sql = 'SELECT category_description FROM "public"."Category" WHERE category_id='.$category;

    $stmt = $connection->query($sql, \PDO::FETCH_ASSOC);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}