<!DOCTYPE html>
<html id="home-page-html">
    <head>
        <?php
            include_once __DIR__ . '/../controller/head.php';
        ?>
    </head>
    <body>
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

        <?php include_once __DIR__.'/../controller/register.php'; ?>
        
        <?php
                include_once __DIR__ . '/../controller/footer.php';
        ?>
    </body>
</html>