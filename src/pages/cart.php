<?php 
    session_start();
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

    <title>Elephant Fitting Club | Shopping Cart</title>
</head>
<body>
    <?php include "includes/header.php";?>
    <?php 
        for($i = 0; $i < count($_POST); $i ++) {
            $_SESSION["meal".$i] = $_POST["meal".$i];
        }
        print_r($_SESSION);
    ?>
    <?php include "includes/footer.php";?>
</body>
</html>