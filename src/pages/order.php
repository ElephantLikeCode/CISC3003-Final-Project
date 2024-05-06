<?php
    session_start();
    include "includes/mealOrder.php";
    
    date_default_timezone_set("Asia/Macau");
    require 'config.php';
    //Connect to the database
    $database = new mysqli($servername, $db_username, $db_password, $dbname);
    if ($database->connect_error) {
        die("Connection failed: " . $database->connect_error);
    }

    //Read meals menu from the database
    $meals = readMeals($database);

    for ($i = 0; $i < count($meals); $i++) {
        if(!isset($_SESSION["cart"]["meal".$i])) {
            $_SESSION["cart"]["meal".$i] = 0;
        }
    }

    $database->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/public.css" type="text/css" rel="stylesheet">
    <link href="style/order.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title>Elephant Fitting Club | Order Menu</title>
</head>
<body>
    <?php include "includes/header.php";?>
    <main>
        <form id="orderForm" method="post" action="cart.php">
        <div>
            <h2>Meal Order</h2>
            <?php
                if (count($meals)%4 == 0) {
                    $rows_num = count($meals)/4;
                }
                else {
                    $rows_num = count($meals)/4 + 1;
                }

                for ($i = 0; $i < $rows_num; $i++) {
                    mealDisplayRow($i * 4, $meals);
                }
            ?>
        </div>
        <div class="addCart">
            <a id="resetBtn" class="formBtn">Clear Cart</a>
            <a href="cart.php" id="submitBtn" class="formBtn">Add to Cart</a>
        </div>
        </form>
    </main>

    <?php include "includes/footer.php";?>

    <script>
        $("#resetBtn").click(function(){
            $(".order").val(0);
            $.ajax({
                type: "POST",
                url: "includes/updateCart.php",
                data: $("#orderForm").serialize(),
                success: function() {
                    $(".order").val(0);
                }
            })
        });

        $(".addBtn").click(function(){
            $(this).prev()[0].stepUp();
            $.ajax({
                type: "POST",
                url: "includes/updateCart.php",
                data: $("#orderForm").serialize()
            })
        });

        $(".dropBtn").click(function(){
            $(this).next()[0].stepDown();
            $.ajax({
                type: "POST",
                url: "includes/updateCart.php",
                data: $("#orderForm").serialize()
            })
        });
    </script>
</body>
</html>