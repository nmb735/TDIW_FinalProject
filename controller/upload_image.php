<?php
include_once __DIR__.'/../model/connectionBD.php';
include_once __DIR__.'/../model/user_session.php';

if (session_status() == PHP_SESSION_NONE) {
    // Start a new session
    session_start();
}

if (isset($_FILES['profile_image']) && !empty($_FILES['profile_image']) && isset($_SESSION['user_id']))
{

    //Save the document on memory
    $filesAbsolutePath = '/home/TDIW/tdiw-d3/public_html/img/userProfileImage/';
    $imageFile = $filesAbsolutePath.$_SESSION['user_id'].'.jpg';//Add id to name the new document 
    move_uploaded_file($_FILES['profile_image']['tmp_name'],$imageFile);

    //Save the path on DB
    $imagePath = './img/userProfileImage/'.$_SESSION['user_id'].'.jpg';
    $connection = connectionBD();
    changeUserImage($connection, $_SESSION['user_id'], $imagePath);

    //Save the path on session
    $_SESSION['profile_image']= $imagePath;

    echo '<section id="confirmation-message" style="grid-area: message;">
    <h2 id="confirmation-thanks"> GREAT! </h2>
    <p id="confirmation-text"> Your image has been succesfully uploaded, and you may now go to the home page and begin your exclusive experience.</p>
    <div id="confirmation-button-container">
        <button id="return-hp-button" type="button" onclick="redirectToHomePage()"> <span id="return-hp-span"></span> <a id="registered-confirmed-a" href="./index.php"> Go to Home Page </a></button>
    </div>
    </section>';

}
else
{
    echo 'Something went wrong, please retry to send an image';
}