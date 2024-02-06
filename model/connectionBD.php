<?php
function connectionBD(){
    $servername = "servername";
    $username = "username";
    $password = "password";
    $dbname = "dbname";
    try{
        $conn = new PDO("pgsql:host=$servername;port=5432;dbname=$dbname", $username, $password);
        return $conn;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
