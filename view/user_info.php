<?php

function printLogInError()
{
        echo '<section id="confirmation-message" style="grid-area: section;">';
        echo '<h2 id="confirmation-thanks"> Something went wrong!</h2>';
        echo '
            <p id="confirmation-text"> Please check your email and password and <a id="a-log-in-error" href="../index.php?resource=log_in"> try again. </a></p>
        </section>';
} 

function printUserInfo()
{ 
    // If there is no session already started
    if (session_status() == PHP_SESSION_NONE) {
        // Start a new session
        session_start();
    }
    
    // If there is no session already started
    if (isset($_SESSION['user_id'])) {
    
        //user session's info:
        /*
        $_SESSION["user_id"] 
        $_SESSION["username"] -
        $_SESSION["profile_image"] 
        $_SESSION["address"] -
        $_SESSION["city"] -
        $_SESSION["zip_code"] -
        $_SESSION["email"] -
        $_SESSION["cart"] 
        $_SESSION["price"]
        */
        ?>
        <div id="section-header-my-account" style="grid-area: section">
            <h2> MY ACCOUNT</h2>
        </div>
        <div id="user-info-update-data" style="grid-area: info;">
            <div class="data-container">
                <h3 class="user-info-header">Username</h3>
                <div class="current-data">
                    <h4 class="current-data-header">Current Username</h4>
                    <p class="current-data-data" id="current-user-name"><?php echo $_SESSION["username"]?></p>
                </div>
                <div class="new-data">
                    <h4 class="new-data-header">New Username</h4>
                    <input type="text" class="new-data-data" id="new-user-name"></input>
                </div>
                <button class="change-button" onclick="updateUserName()"> Change Username </button>
            </div>
            <div class="data-container">
                <h3 class="user-info-header">Email</h3>
                <div class="current-data">
                    <h4 class="current-data-header">Current Email</h4>
                    <p class="current-data-data" id="current-email"><?php echo $_SESSION["email"]?></p>
                </div>
                <div class="new-data">
                    <h4 class="new-data-header">New Email</h4>
                    <input type="mail" class="new-data-data" id="new-email"></input>
                </div>
                <button class="change-button" onclick="updateEmail()"> Change Email </button>
            </div>
            <div class="data-container">
                <h3 class="user-info-header">Address</h3>
                <div class="current-data">
                    <h4 class="current-data-header">Current Address</h4>
                    <p class="current-data-data" id="current-address"><?php echo $_SESSION["address"]?></p>
                </div>
                <div class="new-data">
                    <h4 class="new-data-header">New Adress</h4>
                    <input type="text" class="new-data-data" id="new-address"></input>
                </div>
                <button class="change-button" onclick="updateAddress()"> Change Address </button>
            </div>
            <div class="data-container">
                <h3 class="user-info-header">City</h3>
                <div class="current-data">
                    <h4 class="current-data-header">Current City</h4>
                    <p class="current-data-data" id="current-city"><?php echo $_SESSION["city"]?></p>
                </div>
                <div class="new-data">
                    <h4 class="new-data-header">New City</h4>
                    <input type="text" class="new-data-data" id="new-city"></input>
                </div>
                <button class="change-button" onclick="updateCity()"> Change City </button>
            </div>
            <div class="data-container">
                <h3 class="user-info-header">Zip Code</h3>
                <div class="current-data">
                    <h4 class="current-data-header">Current Zip Code</h4>
                    <p class="current-data-data" id="current-zip-code"><?php echo $_SESSION["zip_code"]?></p>
                </div>
                <div class="new-data">
                    <h4 class="new-data-header">New Zip Code</h4>
                    <input type="text" class="new-data-data" id="new-zip-code"></input>
                </div>
                <button class="change-button" onclick="updateZipCode()"> Change Zip Code </button>
            </div>
        </div>
        <div id="image-user-info" style="grid-area: image;">
            <div id="image-section">
                <img src= "<?php echo $_SESSION["profile_image"] ?>"/>
                <a href="../index.php?resource=upload_image"> <button id="change-profile-image-button"><span id="span-profile-image-button"></span> Change profile image </button> </a>     
            </div>
            <div id="disclaimer-section">
                <ul>
                    <li>Protecion & Privacy Policy</li>
                    <li>Terms and Conitions</li>
                    <li>Data management & Cookies</li>
                    <li>The Artemisa Code</li>
                </ul>
            </div>
        </div>
    <?php }
}?>