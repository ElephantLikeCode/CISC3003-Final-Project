<?php 
    session_start();
    include "includes/mealOrder.php";

    date_default_timezone_set("Asia/Macau");

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
    <section class="selectBox">
        <div class="paymentSelect">
            <h2 class="selectMethod">Select a Payment Method</h2>
            <a href="#" class="pay">Mpay</a>
            <a href="#" class="pay">WeChat Pay</a>
            <a href="#" class="pay">Alipay</a>
            <a href="#" class="credit-pay">Credit Card</a>
            <a href="#" class="backBtn">Back to Cart</a>
        </div>
    </section>

    <section class="useCredit">
        <form class="creditForm" method="post" action="includes/payment.php">
            <h2 class="selectMethod">Credit Card Payment</h2>
            <div class="creditCompany">
                <img src="images/credit1.png" alt="">
                <img src="images/credit2.jpg" alt="">
                <img src="images/credit3.jpg" alt="">
            </div>
            <label>Name on Card</label>
            <input type="text" name="holderName" placeholder="CHAN TAI MAN" required>
            <label>Card Number</label>
            <input type="number" name="cardNumber" placeholder="1234 5678 9012 3456" required>
            <div class="row">
                <div class="month">
                    <label>Month</label>
                    <input type="number" name="month" placeholder="MM" required>
                </div>
                <div class="year">
                    <label>Year</label>
                    <input type="number" name="year" placeholder="YYYY" required>
                </div>
                <div class="csc">
                    <label>CSC</label>
                    <input type="text" name="csc" placeholder="000" required>
                </div>
            </div>
            <input type="submit" class="creditPayBtn" value="Confirm">
            <a href="#" class="creditBackBtn">Back</a>
        </form>
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

            $(".overlay").removeClass("slide-up");
            $(".overlay").addClass("slide-down");
            $(".paymentSelect").removeClass("contract");
            $(".paymentSelect").addClass("expand");
        });

        //Start the payment procedure
        $(".pay").click(function(event){
            event.preventDefault();

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

        $(".credit-pay").click(function(event){
            event.preventDefault();
            $(".creditForm").removeClass("contract");
            $(".creditForm").addClass("expand");
            $(".paymentSelect").removeClass("expand");
            $(".paymentSelect").addClass("contract");
        })
        
        //Close the payment selection block
        $(".backBtn").click(function(event){
            event.preventDefault();
            $(".overlay").removeClass("slide-down");
            $(".overlay").addClass("slide-up");
            $(".paymentSelect").removeClass("expand");
            $(".paymentSelect").addClass("contract");
        })

        //Validate the information on the credit card payment form
        $(".creditPayBtn").click(function(event){
            event.preventDefault();

            var total = $("input[name='total']").serialize();
            const accountInfo = document.cookie.indexOf("; accountInfo=");

            var flag = true;
            var wrong = "";
            const name = $("input[name='cardNumber']").val();
            if (name.length < 1) {
                flag = false;
                wrong += "Invalid Name on Card.\n";
            }

            const num = $("input[name='cardNumber']").val();
            if (num.toString().length != 16) {
                flag = false;
                wrong += "Invalid Card Number.\n";
            }

            const month = $("input[name='month']").val();
            if (month < 1 || month > 12) {
                flag = false;
                wrong += "Invalid Month.\n";
            }

            const date = new Date();
            const currentYear = date.getFullYear();
            const year = $("input[name='year']").val();
            if (year < currentYear || year > currentYear + 20) {
                flag = false;
                wrong += "Invalid Year.\n";
            }

            const csc = $("input[name='csc']").val();
            if(csc.length != 3 || !$.isNumeric(csc)) {
                flag = false;
                wrong += "Invalid Security Code.";
            }

            if(!flag) {
                alert(wrong);
                return flag;
            }

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
        })

        //Close the credit payment block and open payment selection block
        $(".creditBackBtn").click(function(event){
            event.preventDefault();
            $(".creditForm").removeClass("expand");
            $(".creditForm").addClass("contract");
            $(".paymentSelect").removeClass("contract");
            $(".paymentSelect").addClass("expand");
        })
    </script>
</body>
</html>