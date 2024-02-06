<?php

function register($connection)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
        // Obtain the inputs
        $username = $_POST["newUserName"];
        $email = $_POST["newUserEmail"];
        $password = password_hash($_POST["newUserPassword"], PASSWORD_DEFAULT);
        $address = $_POST["newUserAddress"];
        $city = $_POST["newUserCity"];
        $postalCode = $_POST["newUserPostalCode"];
        
        // Filter and validate the inputs
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $username = filter_var($username, FILTER_SANITIZE_STRING);
        $address = substr($address, 0, 30);
        $city = substr($city, 0, 30);       
        $postalCode = preg_replace('/[^0-9]/', '', $postalCode);

        // Validate username (letters and spaces only)
        if (!preg_match("/^[a-zA-Z\s]+$/", $username)) {
            echo "Invalid username format.";
            return;
        }

        // Validate postal code (5 numbers)
        if (!preg_match("/^\d{5}$/", $postalCode)) {
            echo "Invalid postal code format.";
            return;
        }

        // Prepare the SQL statement
        $sql = 'INSERT INTO "public"."User" (username, password_hash, address, city, zip_code, email) VALUES (:username, :password, :address, :city, :postalCode, :email)';
        $stmt = $connection->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':postalCode', $postalCode);

        // Execute the prepared statement
        if ($stmt->execute()) {
        } else {
            echo "Error during registration.";
        }
    }
}

function userVerification($connection)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
       	$email = $_POST["email"];
        $password = $_POST["password"];

        // Prepare the SQL statement
        $sql = 'SELECT email, password_hash FROM "public"."User" WHERE email = :email';
        $stmt = $connection->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':email', $email);

        // Execute the prepared statement
        $stmt->execute();

        // Fetch the result
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
	
        // Check if the user exists and verify the password
        if ($user && password_verify($password, $user['password_hash'])) {
            return 1;
            // You can store user information in session or perform other actions here
        } else {
            return 0;
        }
    }
}

function sessionStart($connection, $verified)
{
    // If there is no session already started
    if (session_status() == PHP_SESSION_NONE) {
        // Start a new session
        session_start();
    }

    // If there is no session already started
    if (!isset($_SESSION['user_id'])) {

        // Check if email is set in $_POST
        if (!isset($_POST["email"])) {
            // Handle the case when email is not set
            echo "Email not provided.";
            return;
        }

        // Get user's info
        // Prepare the SQL statement with placeholders
        $sql = 'SELECT * FROM "public"."User" WHERE email = :email';
        $stmt = $connection->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':email', $_POST["email"]);

        // Execute the prepared statement
        $stmt->execute();

        // Fetch the result
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the query returned any results
        if ($user) {
            // Put user's info in session
            $_SESSION["user_id"] = $user['user_id'];
            $_SESSION["username"] = $user['username'];
            $_SESSION["profile_image"] = $user['profile_image'];
            $_SESSION["address"] = $user['address'];
            $_SESSION["city"] = $user['city'];
            $_SESSION["zip_code"] = $user['zip_code'];
            $_SESSION["email"] = $user['email'];
            $_SESSION["cart"] = []; //ID array from products
            $_SESSION["price"]= 0;
            $_SESSION["amount"]= 0;


        } else {
            // Handle the case when no user is found
            echo "User not found.";
        }
    }
}

function changeUserImage($connection, $user_id, $newImagePath)
{
    // Prepare the SQL statement with placeholders
    $sql = 'UPDATE "public"."User" SET profile_image = :profile_image WHERE user_id = :user_id';
    $stmt = $connection->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':profile_image', $newImagePath);

    // Execute the prepared statement
    $stmt->execute();
}

function changeUserName($connection, $user_id, $newUserName)
{
    // Prepare the SQL statement with placeholders
    $sql = 'UPDATE "public"."User" SET username = :username WHERE user_id = :user_id';
    $stmt = $connection->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':username', $newUserName);

    // Execute the prepared statement
    $stmt->execute();
}

function changeUserEmail($connection, $user_id, $newEmail)
{
    // Prepare the SQL statement with placeholders
    $sql = 'UPDATE "public"."User" SET email = :email WHERE user_id = :user_id';
    $stmt = $connection->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':email', $newEmail);

    // Execute the prepared statement
    $stmt->execute();
}

function changeUserAddress($connection, $user_id, $newAddress)
{
    // Prepare the SQL statement with placeholders
    $sql = 'UPDATE "public"."User" SET address = :address WHERE user_id = :user_id';
    $stmt = $connection->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':address', $newAddress);

    // Execute the prepared statement
    $stmt->execute();
}

function changeUserCity($connection, $user_id, $newCity)
{
    // Prepare the SQL statement with placeholders
    $sql = 'UPDATE "public"."User" SET city = :city WHERE user_id = :user_id';
    $stmt = $connection->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':city', $newCity);

    // Execute the prepared statement
    $stmt->execute();
}

function changeUserZipCode($connection, $user_id, $newZipCode)
{
    // Prepare the SQL statement with placeholders
    $sql = 'UPDATE "public"."User" SET zip_code = :zip_code WHERE user_id = :user_id';
    $stmt = $connection->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':zip_code', $newZipCode);

    // Execute the prepared statement
    $stmt->execute();
}

function getUserName($connection,$userID)
{
    $sql = 'SELECT username from "public"."User" WHERE user_id='.$userID;

    $stmt = $connection->query($sql, \PDO::FETCH_ASSOC);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}




?>
