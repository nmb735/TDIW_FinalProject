<?php
 
/*Genera la llista cartes dels productes*/
function printProductList($products)
{
    echo '<section class="products" style="grid-area: products;">';
    foreach ($products as $instance)
    {
        echo '<div onclick="fetchProductData('."'".$instance["reference"]."'".')" style="display:contents;"><div class="card-cat" id="'.$instance['reference'].'">';
            echo '<img src="'.$instance['image'].'" alt="">';
            echo '<div class="info-cat">';
                echo '<h5>'.$instance['name'].'</h5>';
                echo '<p class="p-cat">'.$instance['current_price'].'</p>';
            echo '</div>';
        echo '</div></div>';
    }       
    echo '</section>';
}

/*Imprimeix el detall del producte*/
function printProductDetail($products, $sizes)
{ 
    foreach ($products as $instance)
    {
        echo '<div id="layout-product-detail">';
            echo '<section id="product-detail" class="product-title" style="grid-area: product-title;">';
                echo '<h2 class="headers-home-page h2-pd" id="'.$instance['reference'].'"> <a class="a-cat-pd" href="index.php?resource=product&product='.$instance['reference'].'">'.$instance['name'].'</a></h2>';
                echo '<p id="product-price-pd" class="p-cat">'.$instance['current_price'].'</p>';
                echo '<button id="purchase-button" type="button" onclick="fetchProductInfo()"> <span id="purchase-span"></span> Add to Cart</button>';
            echo '</section>';

            echo '<section id="product-image" style="grid-area: product-image;">';
                echo '<img src="'.$instance['image'].'" alt="Articulo">';
            echo '</section>';

            echo '<section id="product-information" style="grid-area: product-information;">';
                echo '<h3 class="headers-home-page h3-pd"> Sizes </h3>';
                echo '<div id="sizes-container">';
                    foreach ($sizes as $instance_sizes)
                    {
                        echo '<div id="'.$instance_sizes['product_id'].'" class="size" onclick="selectSize(this)">';
                            echo $instance_sizes['size'];
                        echo '</div>';
                    }         
                echo '</div>';
                echo '<h3 class="headers-home-page h3-pd"> Quantity </h3>';
                echo '<div class="quantity-container">
                        <div class="quantity-btn" onclick="decrementQuantity()">-</div>
                        <input type="number" class="quantity-input" value="1" min="1">
                        <div class="quantity-btn" onclick="incrementQuantity()">+</div>
                        </div>';
                echo '<h3 class="headers-home-page h3-pd"> Product Description </h3>';
                echo '<p class="p-cat">'.$instance['description'].'</p>';
            echo '</section>';
        echo '</div>';
    }

}