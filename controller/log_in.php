<?php

    include_once __DIR__.'/../model/connectionBD.php';
    include_once __DIR__.'/../model/user_session.php';
    include_once __DIR__.'/../view/user_info.php';

    // If there is no session already started
    if (session_status() == PHP_SESSION_NONE) {
        // Start a new session
        session_start();
    }


    $connection = connectionBD();
    $verified = 0;
    $verified = userVerification($connection);
    
    //Case 1: user logged in for first time correctly
    if($verified)
    {
        sessionStart($connection,$verified);
        printUserInfo();
    }
    else
    {

        //case 2: usser was already logged in
        if(isset($_SESSION['user_id']))
        {
            printUserInfo();
        }
        //Case 3: user did not logged in correctly
        else
        {
            printLogInError();
        }
    }
    
    
    
    



