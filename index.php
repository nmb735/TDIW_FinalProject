<?php

require_once __DIR__.'/base-url-config.php';

$resource = $_GET['resource'] ?? null;

switch ($resource) {
    case 'categories':
        require __DIR__.'/resources/category_list.php';
        break;
    case 'products':
        require __DIR__.'/resources/product_list.php';
        break;
    case 'product':
        require __DIR__.'/resources/product_detail.php';
        break;
    case 'log_in':
        require __DIR__.'/resources/log_in.php';
        break;
    case 'register':
        require __DIR__.'/resources/register.php';
        break;
    case 'register_confirm':
        require __DIR__.'/resources/register_confirmation.php';
        break;
    case 'cart':
        require __DIR__.'/resources/shopping_cart.php';
        break;
    case 'confirmation':
        require __DIR__.'/resources/confirmation_page.php';
        break;
    case 'user_info':
        require __DIR__.'/resources/log_in_info.php';
        break;
    case 'upload_image':
        require __DIR__.'/resources/upload_image.php';
        break;
    case 'image_confirm':
        require __DIR__.'/resources/upload_image_info.php';
        break;
    case 'orders':
        require __DIR__.'/resources/my_orders.php';
        break;
    case 'log_out':
        require __DIR__.'/resources/log_out.php';
        break;
    default:
        require __DIR__.'/resources/category_list.php';
        break;
}
?>