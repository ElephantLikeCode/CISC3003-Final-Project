<?php 
    session_start();
    include "includes/mealOrder.php";

    //Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "sqHinL_2003717"; //Your database password here
    $dbname = "cisc3003";

    $database = new mysqli($servername, $username, $password, $dbname);

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/public.css" type="text/css" rel="stylesheet">
    <link href="style/cart.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title>Elephant Fitting Club | Shopping Cart</title>
</head>
<body>
    <?php include "includes/header.php";?>
    
    <div class="overlay"></div>
    <section class="paymentSelect">
        <a href="#" class="pay">Mpay</a>
        <a href="#" class="pay">WeChat Pay</a>
        <a href="#" class="pay">Alipay</a>
        <a href="#" class="credit-pay">Credit Card</a>
        <a href="#" class="backBtn">Back to Cart</a>
    </section>

    <section class="paymentDisplay">
        <h2 class="pageTitle">Shopping Cart</h2>
        <form id="paymentForm" method="post" action="includes/payment.php">
            <?php displayPayment($meals);?>
            <div class="buttonList">
                <a href="order.php" id="backBtn" class="formBtn">Back to Order</a>
                <a href="#" id="confirmBtn" class="formBtn">Confirm</a>
            </div>
        </form>
    </section>
    <?php include "includes/footer.php";?>
    <script>
        $("#confirmBtn").click(function(event){
            event.preventDefault();

            var total = $("input[name='total']").serialize();
            const accountInfo = document.cookie.indexOf("; accountInfo=");

            //Prevent non-login user submit order
            if (accountInfo == -1) {
                alert("Please log in before you submit your order.")
                return false;
            }

            //Prevent users submit empty order
            if (total == "") {
                alert("Your shopping cart is empty.");
                return false;
            }

            $("body").addClass("paying");
        });

        $(".pay").click(function(event){
            event.preventDefault();
            $("#paymentForm").submit();

            var total = $("input[name='total']").serialize();
            const accountInfo = document.cookie.indexOf("; accountInfo=");

            //Post the order to payment.php
            $.ajax({
                type: "POST",
                url: "includes/payment.php",
                data: $("#paymentForm").serialize(),
                success: function() {
                    alert("Payment Success");
                    window.location.reload(true);
                }
            });
        });

        $(".backBtn").click(function(event){
            event.preventDefault();
            $("body").removeClass("paying");
        })
    </script>
</body>
</html>