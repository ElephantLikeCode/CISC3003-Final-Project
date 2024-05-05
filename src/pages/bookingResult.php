<?php
    session_start();
    echo $_SESSION['result'];
    if($_SESSION['result']){
        echo "<h1>The time slot is already booked!</h1>";
    }
    else{
        $startDate=$_SESSION['startDate'];
        $startTime=$_SESSION['startTime'];
        $endDate=$_SESSION['endDate'];
        $endTime=$_SESSION['endTime'];
        echo "<h1>Booking Successes</h1>";
        echo "
<table>
    <tr>
    <th>startDate</th>
    <th>startTime</th>
    <th>endDate</th>
    <th>endTime</th>
    
</tr>
    <tr>
    <td>$startDate</td>
    <td>$startTime</td>
    <td>$endDate</td>
    <td>$endTime</td>
</tr>
</table>";
        session_destroy();
    }