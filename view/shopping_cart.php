<?php
function renderShopppingCart($products, $totalQuantity, $finalCheckOutPrice)
{
?>
    <section id="products-shopping-cart" style="grid-area: products;">
        <h2 id="h2-shopping-cart"> MY SHOPPING CART (<?php echo $totalQuantity; ?>)</h2>

        <?php foreach ($products as $product) : ?>
            <div class="product-shopping-cart-container">
                <div class="product-shopping-cart-image">
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?> Image">
                </div>
                <div class="product-shopping-cart-info" id="<?php echo $product['productID']; ?>">
                    <h3 id="h3-shopping-cart"> <?php echo $product['name']; ?></h3><br>
                    <div class="size-sc-container">
                        <h4 class="sc-product-info-title">Size: </h4><h4 class="sc-product-info-data"> <?php echo $product['size']; ?></h4>
                    </div>
                    <div class="reference-sc-container">
                        <h4 class="sc-product-info-title">Reference: </h4><h4 class="sc-product-info-data"> <?php echo $product['reference']; ?></h4>
                    </div>
                    <div class="quantity-sc-container">
                        <h4 class="sc-product-info-title">Quantity: </h4>
                        <div class="quantity-container">
                            <input type="number" class="quantity-input" id="update-product-quantity-<?php echo $product['productID']; ?>" value="<?php echo $product['quantity']; ?>" min="1" data-productid="<?php echo $product['productID']; ?>" oninput="fetchUpdatedProducts(this)">
                        </div>
                    </div>
                    <div class="price-sc-container">
                        <h4 class="sc-product-info-title">Price: </h4><h4 class="sc-product-info-data"> <?php echo $product['totalPrice']; ?>€</h4>
                    </div>  
                    <div onclick="deleteProduct('<?php echo $product['productID']; ?>')" class="close-button-container">
                        <span class="close-button">x</span>
                    </div>   
                </div>
            </div>
        <?php endforeach; ?>

    </section>
    <?php
}
?>

<?php
function renderShopppingCartSummary($products, $totalQuantity, $finalCheckOutPrice)
{
?>
    <section id="summary-shopping-cart" style="grid-area: summary;">
        <div class="product-shopping-cart-price">
            <div class="info-line">
                <p class="info-line-title">Total Quantity</p>
                <p class="info-line-data"><?php echo $totalQuantity; ?></p>
            </div>
            <div class="info-line">
                <p class="info-line-title">Subtotal</p>
                <p class="info-line-data"><?php echo $finalCheckOutPrice; ?>€</p>
            </div>
            <div class="info-line">
                <p class="info-line-title">Shipping Costs</p>
                <p class="info-line-data">0.00€ </p>
            </div>
        </div>
        <div class="product-shopping-cart-total-price">
            <div class="info-line">
                <p class="info-line-title">Estimated Total (incl. VAT)</p>
                <p class="info-line-data"><?php echo $finalCheckOutPrice; ?>€</p>
            </div>
        </div>
        <a id="a-check-out-button" href="./index.php?resource=confirmation">
            <button class="checkout-button" type="button"> 
                <div class="checkout-button-content">
                    <span class="checkout-span"></span>
                    <img src="../img/lock-closed-outline.svg">
                    CHECK OUT
                </div>
        </a>
        </button>
        <button onClick="fetchEmptyCart()" class="checkout-button" type="button"> 
            <div class="checkout-button-content">
                <span class="checkout-span"></span>
                EMPTY CART
            </div>
        </button>

    </section>
<?php
}
?>
