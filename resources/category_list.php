<html lang="en" id="home-page-html">
<head>
    <?php
        include_once __DIR__ . '/../controller/head.php';
    ?>
</head>

<body>
    <div id="layout-home-page">
        <video class="video-bg" autoplay muted loop>
           <source src="../img/video/backgroundVideoArtemisa.mp4"
           type="video/mp4"> 
        </video>
        <section id="home-page-header" style="grid-area: header;">
            <div id="logo-home-page">
                <a class="home-page-anchor" href="./index.php">
                    <img src="../img/artemisaLogoWhite.png" alt="Artemisa Logo, in white">
                </a> 
            </div>
            <div class="nav" id="nav-home-page">
                <ul>
                    <?php include_once __DIR__.'/../controller/options.php'; ?>
                </ul>
            </div>

        </section>

    <section class="name-premium" id="home-page-name-premium" style="grid-area: name-premium;">
        <h1 class="headers-home-page"> Artemisa </h1>
        <p id="home-page-p"> Own the streets. Own your style. Own yourself.</p>
        <a class="home-page-anchor" href="index.php?resource=products&category=6"><button id="button-home-page" type="button"> <span id="home-page-span"></span> Explore Artemisa Premium &copy;</button></a>
    </section>

    <?php
        include_once __DIR__ . '/../controller/category_list.php';
    ?>

    <?php
        include_once __DIR__ . '/../controller/footer.php';
    ?>

   
</div>
    </body>
</html>