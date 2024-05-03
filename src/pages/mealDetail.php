<?php
    session_start();

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
    $id = $_GET["meal_id"];
    $query = "SELECT * FROM meals WHERE id=".$id;
    $result = $database->query($query);
    $detail = $result->fetch_assoc();
    $title = $detail["title"];
    $desc = $detail["description"];
    $nutri = array();
    parse_str($detail["nutrition"], $nutri);
    $image = $detail["image"];
    $price = $detail["price"];

    $num = $_SESSION["cart"]["meal".$id-1];

    $database->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/public.css" type="text/css" rel="stylesheet">
    <link href="style/mealDetail.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title>Elephant Fitting Club | Order Menu</title>
</head>
<body>
    <?php include "includes/header.php";?>

    <form class="detail" method="post">
        <div class="flex-container">
            <div class="detail-image">
                <img src="images/<?php echo $image;?>" alt="" class="detail-img">
            </div>
            <div class="detail-content">
                <div class="detail-title"><?php echo $title;?></div>
                <div class="detail-desc"><?php echo $desc;?></div>
                <table class="detail-nutri">
                    <h3 class="detail-nutri-title">Nutrition Information:</h3>
                    <tr><td>Calories</td><td><?php echo $nutri["cal"];?>kcal</td></tr>
                    <tr><td>Protein</td><td><?php echo $nutri["protein"];?>g</td></tr>
                    <tr><td>Carbohydrates</td><td><?php echo $nutri["carbs"];?>g</td></tr>
                    <tr><td>Fat</td><td><?php echo $nutri["fat"];?>g</td></tr>
                </table>
                <div class="detail-price">MOP <?php echo number_format($price, 1)?></div>
                <div class="detail-order">
                    <i class='fa fa-minus-circle dropBtn' aria-hidden='true'></i>
                    <input class="detail-num" type="number" name="<?php echo "meal".($id-1);?>" min="0" max="99" value="<?php echo $num;?>">
                    <i class='fa fa-plus-circle addBtn' aria-hidden='true'></i>
                </div>
                <?php
                    for ($i = 0; $i < count($_SESSION["cart"]); $i++){
                        if ($i != $id-1) echo "<input type='hidden' class='order' name='meal".$i."' value='".$_SESSION["cart"]["meal".$i]."'>";
                    }
                ?>
            </div>
        </div>
    </form>

    <?php include "includes/footer.php";?>

    <script>
        $(".addBtn").click(function(){
            $(this).prev()[0].stepUp();
            $.ajax({
                type: "POST",
                url: "includes/updateCart.php",
                data: $(".detail").serialize()
            })
        });

        $(".dropBtn").click(function(){
            $(this).next()[0].stepDown();
            $.ajax({
                type: "POST",
                url: "includes/updateCart.php",
                data: $(".detail").serialize()
            })
        });
    </script>
</body>
</html>