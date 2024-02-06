<html lang="en" id="product-list-html">
    <head>
        <?php
            include_once __DIR__ . '/../controller/head.php';
        ?>
    </head>

    <body>
        <div id="layout-shopping-cart">
            <section id="header-cat-pd" style="grid-area: header;">
                <div id="logo-cat-pd">
                    <a class="a-cat-pd" href="./index.php">
                        <img src="../img/artemisaLogoWhite.png" alt="Artemisa Logo, in white">
                    </a>  
                </div>
                <div id="nav-cat-pd">
                    <ul class="nav-menu">
                    </ul>
                    <div class="hamburguer">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </div>
                </div>
            </section>
            <div id="id-shopping-cart-container">
                <?php
                    include_once __DIR__ . '/../controller/shoppingCart.php';
                ?>
            </div>
            <?php
            include_once __DIR__ . '/../controller/footer.php';
            ?>
            
        </div>
    </body>
</html> 
