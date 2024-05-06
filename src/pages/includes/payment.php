<?php 
    session_start();

    date_default_timezone_set("Asia/Macau");

    //Connect to the database
    /* $servername = "localhost";
    $username = "root";
    $password = "U-MtanWDSRS20040619"; //Your database password here
    $dbname = "cisc3003";

    $database = new mysqli($servername, $username, $password, $dbname); */


    require '../config.php';
    //Connect to the database
    $database = new mysqli($servername, $db_username, $db_password, $dbname);

    if ($database->connect_error) {
        die("Connection failed: " . $database->connect_error);
    }

    $user = get_object_vars(json_decode($_COOKIE["accountInfo"]))["user_name"];
    $total = $_POST["total"];
    $order_content = $_POST["order_content"];
    $time = time();

    $query = "INSERT INTO orders VALUES (NULL, '".$user."','".$total."','".$order_content."','".$time."')";
    $result = $database->query($query);

    unset($_SESSION["cart"]);

    $database->close();
?>