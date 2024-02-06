<?php
function connectionBD(){
    $servername = "localhost";
    $username = "tdiw-d3";
    $password = "a38ZEq9p";
    $dbname = "tdiw-d3";
    try{
        $conn = new PDO("pgsql:host=$servername;port=5432;dbname=$dbname", $username, $password);
        return $conn;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}