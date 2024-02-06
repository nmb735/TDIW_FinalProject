<?php

function printFooter()
{
    echo '
    <section id="footer-web" class="footer" style="grid-area: footer;">
        <div id="web-sm" class="social-media">
            <ul>
                <li class="home-page-li"><a class="home-page-anchor" href="https://www.instagram.com/"><img src="../img/instagramLogo.webp" alt="Instagram Logo"></a></li>
                <li class="home-page-li"><a class="home-page-anchor" href="https://www.linkedin.com/in/nedal-benelmekki-4aaa93236/"><img src="../img/linkedinLogo.png" alt="Linkedin Logo"></a></li>
                <li class="home-page-li"><a class="home-page-anchor" href="https://www.linkedin.com/in/adrià-arús-5920a92a3/"><img src="../img/linkedinLogo.png" alt="Linkedin Logo"></a></li>
                <li class="home-page-li"><a class="home-page-anchor" href="https://www.youtube.com/results?search_query=artemisa"><img src="../img/youtubeLogo.png" alt="Youtube Logo"></a></li>
            </ul>
        </div>
        <div id="artemisa">
            <ul>
                <li class="home-page-li">Artemisa &copy;</li>
                <li class="home-page-li"><img src="../img/artemisaLogoWhite.png" alt="Artemisa Logo White"></li>
                <li class="home-page-li"><img src="../img/artemisaLogoSpecial.png" alt="Artemisa Logo Special"></li>
            </ul>
        </div>
        <div id="custom-popup-container" class="custom-popup-container">
            <div id="custom-popup" class="custom-popup"></div>
        </div>

    </section>
    ';
}

function printMeta()
{
    echo '
    <meta charset="UTF-8"/>
    <title>Artemisa</title>
    <meta name="autors" content="1632367 & 1632368"/>
    <link rel="icon" type="image/jpeg" href="/../img/artemisaLogoBasic.jpeg"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway"/>
    <link rel="stylesheet" href="/../css/style.css">
    <script src="/../js/script.js" defer></script>
    ';
}

function printOptions()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    echo '  <li class="nav-item icons" id="basket-container-home-page">
                <a class="a-cat-pd" id="sb-icon-a">
                    <img id="sb-icon-img" src="../img/sbIconWhite.png" alt="Shopping Basket Icon" onclick="toggleShoppingCart()">
                </a>
                ';

                if(isset($_SESSION['user_id'])){
                    echo '
                        <span id="sb-badge-home-page" class="active-sb-badge-home-page">' . $_SESSION["amount"] . '</span>
                    ';
                }
                else{
                    echo '
                        <span id="sb-badge-home-page" class="active-sb-badge-home-page">0</span>
                    ';
                }

    echo '      <div id="shopping-cart-menu">
                    <div id="cart-title">
                        <h2 id="cart-menu-title">Shopping Cart</h2>
                    </div>
                    <div id="cart-list">';
                    if(isset($_SESSION["cart"])){ 
                        echo '
                        <div id="cart-list-menu-items">
                            <ul>';
                            foreach ($_SESSION["cart"] as $productID => $productInfo) {
                                echo '<li> 
                                        <p>' . $productInfo['name'] . ' x ' . $productInfo['quantity'] . ' | '. $productInfo['total_price'] . '€ </p>
                                    </li>';
                            }
                            echo '</ul>
                        </div>
                        <div id="cart-menu-price">
                            <p> Total: '.$_SESSION["price"].'€</p>
                        </div>';
                    }
    echo'           </div>
                    <div id="cart-menu-purchase-button">
                        <a id="a-cart-menu" href="./index.php?resource=cart">Check Out</a>
                    </div>
                </div>

            </li>
            <li class="nav-item icons"><a class="a-cat-pd" href="#"><img src="../img/settingsIconWhite.png" alt="Settings Icon"></a></li>
            <li class="nav-item icons" id="user-icon">
                <a class="a-cat-pd" href="#"><img src="../img/userIconWhite.png" alt="User Icon" onclick="toggleMenu()"></a>
                <div id="user-menu">
                    <ul>';
                                    
                    if(isset($_SESSION['user_id'])){
                        echo '
                        <li><a class="a-cat-pd" href="./index.php?resource=user_info">My Account</a></li>
                        <li><a class="a-cat-pd" href="./index.php?resource=orders">My Orders</a></li>
                        <li><a class="a-cat-pd" href="./index.php?resource=log_out">Log Out</a></li>
                        ';
                    }
                    else{
                        echo '
                        <li><a class="a-cat-pd" href="./index.php?resource=log_in">Log In</a></li>
                        ';
                    }
                                    
    echo '                               
                    </ul>
                </div>
        </li>';
}
