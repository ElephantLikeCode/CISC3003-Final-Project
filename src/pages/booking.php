<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/public.css" type="text/css" rel="stylesheet">
    <link href="style/booking.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/order.css">
    <script rel="text/javascript" src="js/booking.js"></script>
    <title>Elephant Fitting Club | Order Menu</title>
    <style>
        .meal-img{
            width: 400px;
            height: 400px;
        }
    </style>
</head>
<body>
<?php include "includes/header.php";?>
<main>
    <form>
        <section class="order">
            <h2>Fitness Facility Reservations</h2>
            <div class="flex-container rows-4">
                <div class="meal col1">
                    <div class="meal-img" style="background-image: url('images/treadmill.jpg');"></div>
                    <div class="meal-content" >
                        <div class="meal-title">
                            Treadmill
                        </div>
                        <div class="meal-desc">

                        </div>
                    </div>
                    <div class="meal-cart">
                        <button onclick="window.open(`addBooking.php?item=meal-title`)" class="beautiful-button">Book Now!</button>
                    </div>
                </div>
                <div class="meal col2">
                    <div class="meal-img" style="background-image: url('images/Elliptical Machine.jpg'); background-size: cover;"></div>
                    <div class="meal-content">
                        <div class="meal-title">
                            Elliptical Machine
                        </div>
                        <div class="meal-desc">

                        </div>
                    </div>
                    <div class="meal-cart">
                        <button onclick="window.open(`addBooking.php?item=meal-title`)" class="beautiful-button">Book Now!</button>
                    </div>
                </div>
                <div class="meal col3">
                    <div class="meal-img" style="background-image: url('images/Rowing Machine.jpg');"></div>
                    <div class="meal-content">
                        <div class="meal-title">
                            Rowing Machine
                        </div>
                        <div class="meal-desc">

                        </div>
                    </div>
                    <div class="meal-cart">
                        <button onclick="window.open(`addBooking.php?item=meal-title`)" class="beautiful-button">Book Now!</button>
                    </div>
                </div>
                <div class="meal col4">
                    <div class="meal-img" style="background-image: url('images/Spinning bike.jpg');"></div>
                    <div class="meal-content">
                        <div class="meal-title">
                            Spinning Bike
                        </div>
                        <div class="meal-desc">

                        </div>
                    </div>
                    <div class="meal-cart">
                        <button onclick="window.open(`addBooking.php?item=meal-title`)" class="beautiful-button">Book Now!</button>
                    </div>
                </div>
            </div>

            <div class="flex-container rows-4">
                <div class="meal col1">
                    <div class="meal-img" style="background-image: url('images/Smith Rack.jpg');"></div>
                    <div class="meal-content">
                        <div class="meal-title">
                            Smith Rack
                        </div>
                        <div class="meal-desc">

                        </div>
                    </div>
                    <div class="meal-cart">
                        <button onclick="window.open(`addBooking.php?item=meal-title`)" class="beautiful-button">Book Now!</button>
                    </div>
                </div>
                <div class="meal col2">
                    <div class="meal-img" style="background-image: url('images/Pull-up rack.jpg');"></div>
                    <div class="meal-content">
                        <div class="meal-title">
                            Pull-up Rack
                        </div>
                        <div class="meal-desc">

                        </div>
                    </div>
                    <div class="meal-cart">
                        <button onclick="window.open(`addBooking.php?item=meal-title`)" class="beautiful-button">Book Now!</button>
                    </div>
                </div>
                <div class="meal col3">
                    <div class="meal-img" style="background-image: url('images/Multifunctional supine board.jpg');"></div>
                    <div class="meal-content">
                        <div class="meal-title">
                            Supine Board
                        </div>
                        <div class="meal-desc">

                        </div>
                    </div>
                    <div class="meal-cart">
                        <button onclick="window.open(`addBooking.php?item=meal-title`)" class="beautiful-button">Book Now!</button>
                    </div>
                </div>
                <div class="meal col4">
                    <div class="meal-img" style="background-image: url('images/Leg Press Machine.jpg');"></div>
                    <div class="meal-content">
                        <div class="meal-title">
                            Leg Press Machine
                        </div>
                        <div class="meal-desc">

                        </div>
                    </div>
                    <div class="meal-cart">
                        <button onclick="window.open(`addBooking.php?item=meal-title`)" class="beautiful-button">Book Now!</button>
                    </div>
                </div>
            </div>
        </section>
    </form>
</main>
<?php include "includes/footer.php";?>

<script src="js/order.js"></script>
</body>
</html>