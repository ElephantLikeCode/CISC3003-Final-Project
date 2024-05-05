<?php
    include "Login_information_verification.php";
    session_start();
    $startTimeRequested=strtotime($_POST["startDate"].$_POST["startTime"]);
    $startDate=$_POST["startDate"];
    $startTime=$_POST["startTime"];
    $endTime=$_POST["endTime"];
    $endDate=$_POST["endDate"];
    $endTimeRequested=strtotime($_POST["endDate"].$_POST["endTime"]);
    echo $startTimeRequested;
    $number=$_POST["number"];
    $servername = "localhost";
    $db_username = "root";
    $db_password = "65124477";
    $dbname = "cisc3003";
    $item='test';
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);
    $query = "SELECT bookingId,startDate,startTime,endDate,endTime from bookingRecord where itemName='".$item."'";
    $result = $conn->query($query);
    $_SESSION["result"]=true;
    $email='test@123.com';
    $ids=[];
    if ($result->num_rows > 0) {
        foreach($result as $row){
            $startTimeInRecord[]=strtotime($row["startDate"].$row["startTime"]);
            $endTimeInRecord[]=strtotime($row["endDate"].$row["endTime"]);
            $ids[]=(int)$row["bookingId"];
            if($startTimeRequested>$startTimeInRecord && $endTimeRequested<$endTimeInRecord){
                $result=false;
                $_SESSION["result"]=true;
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
    echo $query;
    $conn->query($query);
    $_SESSION["result"]=true;
    $_SESSION['startDate']=$_POST["startDate"];
    $_SESSION['startTime']=$_POST["startTime"];
    $_SESSION['endDate']=$_POST["endDate"];
    $_SESSION['endTime']=$_POST["endTime"];
    header('location: bookingResult.php');