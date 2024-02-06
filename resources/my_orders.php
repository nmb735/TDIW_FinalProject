<!DOCTYPE html>
<html id="product-list-html">
    <head>
        <?php
            include_once __DIR__ . '/../controller/head.php';
        ?>
    </head>
    <body>
        <div id="layout-user-orders">
            <section id="header-cat-pd" style="grid-area: header;">
                <div id="logo-cat-pd">
                    <a class="a-cat-pd" href="./index.php">
                        <img src="../img/artemisaLogoWhite.png" alt="Artemisa Logo, in white">
                    </a>  
                </div>
                <div id="nav-cat-pd">
                    <ul class="nav-menu">
                        <?php include_once __DIR__.'/../controller/options.php'; ?>

                    </ul>
                    <div class="hamburguer">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </div>
                </div>
            </section>
            <section id="section-header-my-orders" style="grid-area: header-section">
                <h2> MY ORDERS</h2>
            </section>
            <section id="orders" style="grid-area: orders;">
                <?php include_once __DIR__.'/../controller/order.php'; ?>
            </section>
            <section id="image-user-info" style="grid-area: image;">
                <div id="image-section">
                    <?php if(isset($_SESSION['user_id'])){ ?>
                        <img src= "<?php echo $_SESSION["profile_image"] ?>"/>
                        <h3 id="img-user-name"> <?php echo $_SESSION["username"]?></h3> 
                    <?php } ?> 
                </div>
                <div id="disclaimer-section">
                    <ul>
                        <li>Protecion & Privacy Policy</li>
                        <li>Terms and Conitions</li>
                        <li>Data management & Cookies</li>
                        <li>The Artemisa Code</li>
                    </ul>
                </div>
            </section>

            <?php
                include_once __DIR__ . '/../controller/footer.php';
            ?>
        </div>
    </body>
</html>
