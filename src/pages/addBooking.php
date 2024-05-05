<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="style/public.css" type="text/css" rel="stylesheet">
    <link href="style/menu.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Elephant Fitting Club | Stronger than elephant!</title>
</head>
<body>
<?php include_once "includes/header.php";?>
<section>


            <?php
        $item=$_GET['item'];
        echo "<h1>$item</h1>";
        echo "<form action='bookingHandler.php?item=".$item."' method='post' id='bookingForm'>";
            ?>
        <label>
            Start From
            <input type="date" name="startDate">
            <input type="time" name="startTime">
        </label>
        <label>
            Until
            <input type="date" name="endDate">
            <input type="time" name="endTime">
        </label>
        <label>
            Number of people
            <input type="number" min="1" name="number">
        </label>
        <input type="submit">
    </form>
</section>
</body>
<?php include_once "includes/footer.php";?>
</html>
