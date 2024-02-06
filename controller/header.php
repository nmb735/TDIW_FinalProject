<?php

    include_once __DIR__.'/../model/category.php';
    include_once __DIR__.'/../model/connectionBD.php';

    $connection = connectionBD();
    $categories = getCategories($connection);


    include_once __DIR__.'/../view/category.php';
    
    printCategoryHeader($categories);
?>
