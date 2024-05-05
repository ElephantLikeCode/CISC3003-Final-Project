<?php
    session_start();

    date_default_timezone_set("Asia/Macau");

    //Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "root"; //Your database password here
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
                    <?php if (!empty($nutri)):?>
                        <h3 class="detail-nutri-title">Nutrition Information:</h3>
                        <?php if (isset($nutri["cal"])):?>
                            <tr><td>Calories</td><td><?php echo $nutri["cal"];?>kcal</td></tr>
                        <?php endif;?>
                        <?php if (isset($nutri["protein"])):?>
                            <tr><td>Protein</td><td><?php echo $nutri["protein"];?>g</td></tr>
                        <?php endif;?>
                        <?php if (isset($nutri["carbs"])):?>
                            <tr><td>Carbohydrates</td><td><?php echo $nutri["carbs"];?>g</td></tr>
                        <?php endif;?>
                        <?php if (isset($nutri["fat"])):?>
                            <tr><td>Fat</td><td><?php echo $nutri["fat"];?>g</td></tr>
                        <?php endif;?>
                    <?php endif;?>
                </table>
                <div class="detail-price">MOP <?php echo number_format($price, 1)?></div>
                <div class="detail-order">
                    <i class='fa fa-minus-circle dropBtn' aria-hidden='true'></i>
                    <input class="detail-num" type="number" name="<?php echo "meal".($id-1);?>" min="0" max="99" value="<?php echo $num;?>">
                    <i class='fa fa-plus-circle addBtn' aria-hidden='true'></i>
                </div>
                <a href="order.php" class="backBtn">Back to Order</a>
                <?php
                    for ($i = 0; $i < count($_SESSION["cart"]); $i++){
                        if ($i != $id-1) echo "<input type='hidden' class='order' name='meal".$i."' value='".$_SESSION["cart"]["meal".$i]."'>";
                    }
                ?>
            </div>
        </div>
    </form>
    
    <section class="comment">
        <div class="hr"></div>
        <h2 class="comment-title">Comments</h2>
        <form id="comment-form" method="post" action="includes/updateComment.php?meal_id=1">
            <div class="error error-title"></div>
            <textarea class="comment-input" id="input-title" name="title" maxlength="50" placeholder="Write your comment title here..."></textarea>
            <div class="error error-content"></div>
            <textarea class="comment-input" id="input-content" name="content" maxlength="500" placeholder="Write your comment content here..."></textarea>
            <div class="commentBtn">
                <a href="#" class="comment-submitBtn">Comment</a>
            </div>
        </form>
        <div class="comment-display">
        </div>
    </section>

    <?php include "includes/footer.php";?>

    <script>
        const param = new URLSearchParams(window.location.search);
        const meal_id = param.get('meal_id');
        $(".comment-display").load("includes/displayComments.php?meal_id="+ meal_id);

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

        $(".comment-submitBtn").click(function(event){
            event.preventDefault();
            const accountInfo = document.cookie.indexOf("; accountInfo=");

            //Prevent non-login user submit order
            if (accountInfo == -1) {
                alert("Please log in before you comment.")
                return false;
            }

            $flag = true;
            $title = $("#input-title").val();
            $content = $("#input-content").val();
            $isWhitespaceString = str => !str.replace(/\s/g, '').length;

            if ($isWhitespaceString($title)) {
                $(".error-title").html("Title cannot be empty");
                $flag = false;
            }
            if ($isWhitespaceString($content)) {
                $(".error-content").html("Content cannot be empty");
                $flag = false;
            }

            $data = $("#comment-form").serialize();

            if($flag) {
                $(".error-title").html("");
                $(".error-content").html("");
                $("#input-title").val("");
                $("#input-content").val("");
                $.ajax({
                    type: "POST",
                    url: "includes/updateComment.php?meal_id=" + meal_id,
                    data: $data,
                    success: function() {
                        $(".comment-display").load("includes/displayComments.php?meal_id="+ meal_id);
                    }
                });
            }
        });
    </script>
</body>
</html>