<?php
    session_start();

    date_default_timezone_set("Asia/Macau");

    //Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "U-MtanWDSRS20040619"; //Your database password here
    $dbname = "cisc3003";

    $database = new mysqli($servername, $username, $password, $dbname);

    if ($database->connect_error) {
        die("Connection failed: " . $database->connect_error);
    }

    $query = "SELECT * FROM meal_comment WHERE meal_id=".$_GET["meal_id"];
    $result = $database->query($query);

    while($row = $result->fetch_assoc()) {       
?>
    <div class="comment-block">
        <div class="comment-block-title">
            <?php echo $row["title"];?>
        </div>
        <div class="comment-block-info">
            <div class="comment-block-name">
                <?php echo $row["user_name"];?>
            </div>
            <div class="comment-block-date">
                <?php echo date("Y-m-d H:i", $row["timestamp"]);?>
            </div>
        </div>
        <div class="comment-block-text">
            <?php echo $row["content"];?>
        </div>
    </div>
<?php }?>