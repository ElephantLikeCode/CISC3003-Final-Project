<?php
    session_start();

    date_default_timezone_set("Asia/Macau");

    //Connect to the database
    /* $servername = "localhost";
    $username = "root";
    $password = "U-MtanWDSRS20040619"; //Your database password here
    $dbname = "cisc3003";

    $database = new mysqli($servername, $username, $password, $dbname); */

    require 'config.php';
    //Connect to the database
    $database = new mysqli($servername, $db_username, $db_password, $dbname);

    if ($database->connect_error) {
        die("Connection failed: " . $database->connect_error);
    }

    $id = $_GET["meal_id"];
    $name = json_decode($_COOKIE["accountInfo"])->user_name;
    $title = $_POST["title"];
    $content = $_POST["content"];
    $time = time();

    $query = "INSERT INTO meal_comment VALUES (NULL, '".$id."', '".$name."', '".$title."', '".$content."', '".$time."')";
    $database->query($query);

    $database->close();
?>