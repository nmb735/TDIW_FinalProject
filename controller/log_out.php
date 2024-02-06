<?php
if (session_status() == PHP_SESSION_NONE) {
    // Start a new session
    session_start();
}

session_destroy();?>


   
<section id="confirmation-message" style="grid-area: message;">
    <h2 id="confirmation-thanks"> BYE! </h2>
    <p id="confirmation-text"> You have been logged out, and you may now go to the home page and begin your exclusive experience.</p>
    <div id="confirmation-button-container">
        <button id="return-hp-button" type="button" onclick="redirectToHomePage()"> <span id="return-hp-span"></span> <a id="registered-confirmed-a" href="./index.php"> Go to Home Page </a></button>
    </div>
</section>
