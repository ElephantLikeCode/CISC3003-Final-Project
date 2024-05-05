<?php
    include "Login_information_verification.php";
    session_start();
    $startTimeRequested=strtotime($_POST["startDate"].$_POST["startTime"]);
    $endTimeRequested=strtotime($_POST["endDate"].$_POST["endTime"]);
    echo $startTimeRequested;
    $number=$_POST["number"];
    $servername = "localhost";
    $db_username = "root";
    $db_password = "65124477";
    $dbname = "cisc3003";
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);
    $query = "SELECT startDate,startTime,endDate,endTime from bookingRecord where itemName='".$item."'";
    $result = $conn->query($query);
    $bookingResult=true;
    if ($result->num_rows > 0) {
        foreach($result as $row){
            $startTimeInRecord[]=strtotime($row["startDate"].$row["startTime"]);
            $endTimeInRecord[]=strtotime($row["endDate"].$row["endTime"]);
            if($startTimeRequested>$startTimeInRecord && $endTimeRequested<$endTimeInRecord){
                $result=false;
            }
        }
    }
    $_SESSION["result"]=true;
    $_SESSION['startDate']=$_POST["startDate"];
    $_SESSION['startTime']=$_POST["startTime"];
    $_SESSION['endDate']=$_POST["endDate"];
    $_SESSION['endTime']=$_POST["endTime"];
    header('location: bookingResult.php');