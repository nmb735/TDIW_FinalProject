<!DOCTYPE html>
<html id="product-list-html">
    <head>
        <?php
            include_once __DIR__ . '/../controller/head.php';
        ?>
    </head>
    <body>
        <div id="layout-upload-image">
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
            <div id="upload-image-container" style="grid-area: upload;">
                <div id="form-image-container">
                    <form action="./index.php?resource=image_confirm" method="post" enctype="multipart/form-data">
                        <input type="file" name="profile_image" />
                        <p>(Only .jpg files can be used as profile images)</p>
                        <button type="submit" class="button-logIn-register"><span class="span-logIn-register"></span> Upload Image </button>
                    </form>
                </div>
            </div>
            <?php
                include_once __DIR__ . '/../controller/footer.php';
            ?>
        </div>
    </body>
</html>