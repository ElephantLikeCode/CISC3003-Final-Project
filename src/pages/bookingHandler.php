<?php
    include "Login_information_verification.php";
    session_start();
    $startTimeRequested=strtotime($_POST["startDate"].$_POST["startTime"]);
    $startDate=$_POST["startDate"];
    $startTime=$_POST["startTime"];
    $endTime=$_POST["endTime"];
    $endDate=$_POST["endDate"];
    $endTimeRequested=strtotime($_POST["endDate"].$_POST["endTime"]);
    $number=$_POST["number"];


    /* $servername = "localhost";
    $db_username = "root";
    $db_password = "U-MtanWDSRS20040619";
    $dbname = "cisc3003";
    $conn = new mysqli($servername, $db_username, $db_password, $dbname); */

    require 'config.php';
    //Connect to the database
    $database = new mysqli($servername, $db_username, $db_password, $dbname);

    $item='test';
    
    $query = "SELECT bookingId,startDate,startTime,endDate,endTime from cisc3003.bookingrecord where itemName='".$item."'";
    $result = $conn->query($query);
    $_SESSION["result"]='true';
    echo $_SESSION['result'];
    $email='test@123.com';
    $ids=[];
    if ($result->num_rows > 0) {
        foreach($result as $row){
            $startTimeInRecord=strtotime($row["startDate"].$row["startTime"]);
            $endTimeInRecord=strtotime($row["endDate"].$row["endTime"]);
            $ids[]=(int)$row["bookingId"];
            echo $startTimeInRecord;
            if($startTimeRequested>=$startTimeInRecord && $endTimeRequested<=$endTimeInRecord){
                $_SESSION["result"]='false';
                header('location: bookingResult.php');
                return;
            }
        }
    }
    if(sizeof($ids)!=0){
        $maxId=max($ids)+1;
    }
    else{
        $maxId=1;
    }
    $query = "INSERT INTO bookingRecord values ('$maxId','$startDate','$startTime','$endDate','$endTime','$number','$item','$email')";
    $conn->query($query);
    $_SESSION['startDate']=$_POST["startDate"];
    $_SESSION['startTime']=$_POST["startTime"];
    $_SESSION['endDate']=$_POST["endDate"];
    $_SESSION['endTime']=$_POST["endTime"];
    header('location: bookingResult.php');