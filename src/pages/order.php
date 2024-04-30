<!DOCTYPE html>
<html lang="en">
<?php
    include "includes/mealOrder.php";

    //Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = ""; //Your database password

    $database = new mysqli($servername, $username, $password);

    if ($database->connect_error) {
        die("Connection failed: " . $database->connect_error);
    }

    $meals = readMeals($database);

    $database->close();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/public.css" type="text/css" rel="stylesheet">
    <link href="style/order.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Elephant Fitting Club | Order Menu</title>
</head>
<body>
    <?php include "includes/header.php";?>
    <main>
        <form>
        <section class="order">
            <h2>Meal Order</h2>
            <?php
                if (count($meals)%4 == 0) {
                    $rows_num = count($meals)/4;
                }
                else {
                    $rows_num = count($meals)/4 + 1;
                }

                for ($i = 0; $i < $rows_num; $i++) {
                    meal_display_row($i * 4, $meals);
                }
            ?>
        </section>
        <?php 
            for ($i = 0; $i < count($meals); $i++) {
                echo "<input type='hidden' class='mealNum' name='".($i+1)." 'value='0'>";
            }
        ?>
        </form>
    </main>
    <?php include "includes/footer.php";?>

    <script src="js/order.js"></script>
</body>
</html>