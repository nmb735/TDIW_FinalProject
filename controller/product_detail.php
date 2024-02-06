<?php

include_once __DIR__.'/../model/connectionBD.php';
include_once __DIR__.'/../model/product.php';


$productRef = $_GET['reference'];

$connection = connectionBD();
$product = getProductByRef($connection,$productRef);
$sizes = getSizesByRef($connection,$productRef);


require __DIR__.'/../view/product.php';

printProductDetail($product,$sizes);