<?php
function meal_display_single($i, $meals) {
    echo "
    <div class='meal'>
        <div class='meal-img' style='background-image: url(\"images/".$meals[$i]['image']."\");'></div>
        <div class='meal-content'>
            <div class='meal-title'>".
                $meals[$i]['title'].
            "</div>
            <div class='meal-desc'>".
                $meals[$i]['description'].    
            "</div>
            <div class='meal-price'>MOP ".
                $meals[$i]['price'].
            "</div>
        </div>
        <div class='meal-cart'>
            <i class='fa fa-minus-circle' aria-hidden='true'></i>
            <input type='number' id='".$i."' name='meal-count' min='0' value='0'>
            <i class='fa fa-plus-circle' aria-hidden='true'></i>
        </div>
    </div>
    ";
}

function meal_display_row($initial, $meals) {
    echo "<div class='flex-container rows-4'>";
    for ($i = $initial; $i < $initial + 4; $i++) {
        meal_display_single($i, $meals);
    }
    echo "</div>";
}

function readMeals($database) {
    $query = "SELECT * FROM cisc3003.meals";
    $result = $database->query($query);

    $meals = array();
    while ($row = $result->fetch_assoc()) {
        array_push($meals, $row);
    }
    
    return $meals;
}
?>