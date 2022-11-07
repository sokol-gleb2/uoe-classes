<?php
    // $mysqli = new mysqli('127.0.0.1', 'u476167037_admin', 'Gleb171201!', 'u476167037_users');
    // if ($mysqli->connect_errno) {
    //     throw new RuntimeException('mysqli connection error: ' . $mysqli->connect_error);
    // }
        
        
    // $mysqli->set_charset('utf8mb4');
    // if ($mysqli->errno) {
    //     // throw new RuntimeException('mysqli error: ' . $mysqli->error);
    //     echo "no";
    // }
    // echo "success";

    $host = "sql113.byethost3.com";
    $username = "b3_32921826";
    $password = "Gleb171201!";
    $dbname = "b3_32921826_uoe_classes";
    // Create connection
    $conn = new mysqli($host, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>