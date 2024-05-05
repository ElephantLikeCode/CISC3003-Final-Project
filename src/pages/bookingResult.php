<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/public.css" type="text/css" rel="stylesheet">
    <link href="style/menu.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/order.css">
    <link rel="stylesheet" href="style/bookResult.css">
    <title>Elephant Fitting Club | Stronger than elephant!</title>
</head>
<body>
<?php include "includes/header.php";?>
<section>
    <div style="display: flex; justify-content: center;height: 70vh;align-items: center;flex-flow: column">
    <?php
    session_start();
    if(!true){
        echo "<h1 style='font-size: xxx-large'>The time slot is already booked!</h1>
                <button onclick='window.open(`addBooking.php?item=meal-title`)' class='beautiful-button' style='margin-top: 5vh;font-size: x-large;padding: 2vh'>Return to book another!</button>";
    }
    else{
        /*$startDate=$_SESSION['startDate'];
        $startTime=$_SESSION['startTime'];
        $endDate=$_SESSION['endDate'];
        $endTime=$_SESSION['endTime'];*/
        $startDate=1;
        $startTime=2;
        $endDate=3;
        $endTime=4;
        echo "<h1 style='font-size: xxx-large'>Booking Successes!</h1><br>
                <h1 style='font-size: xxx-large'>Time to Do Some Exercise!</h1><br><br><br>";
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
</table>
<button onclick='window.open(`addBooking.php?item=meal-title`)' class='beautiful-button' style='margin-top: 5vh;font-size: x-large;padding: 2vh'>Return to book another!</button>";
        session_destroy();
    }
    ?>
    </div>
</section>
</body>
<?php include "includes/footer.php";?>
</html>
