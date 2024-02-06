<?php

include_once __DIR__.'/../model/connectionBD.php';
include_once __DIR__.'/../model/product.php';
include_once __DIR__.'/../model/category.php';

$categoryId = $_GET['category'];

$connection = connectionBD();
$products = getProductsByCategory($connection,$categoryId);
$category = getCategoryByID($connection,$categoryId);


include_once __DIR__.'/../view/product.php';
include_once __DIR__.'/../view/category.php';

printCategoryDescription($category);
printProductList($products);

?>