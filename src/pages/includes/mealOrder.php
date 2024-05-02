<?php
function mealDisplaySingle($i, $meals) {
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
            <i class='fa fa-minus-circle dropBtn' aria-hidden='true'></i>
            <input type='number' id='".$i."' class='order' name='meal".$i."' min='0' max='99' value='".$_SESSION["cart"]["meal".$i]."'>
            <i class='fa fa-plus-circle addBtn' aria-hidden='true'></i>
        </div>
    </div>
    ";
}

function mealDisplayRow($initial, $meals) {
    echo "<div class='flex-container rows-4'>";
    for ($i = $initial; $i < $initial + 4; $i++) {
        mealDisplaySingle($i, $meals);
    }
    echo "</div>";
}

function readMeals($database) {
    $query = "SELECT * FROM meals";
    $result = $database->query($query);

    $meals = array();
    while ($row = $result->fetch_assoc()) {
        array_push($meals, $row);
    }
    
    return $meals;
}

function displayPayment($meals) {
    $order = $_SESSION["cart"];
    $serialize = serialize($order);
    $price = 0;
    $subtotal = 0;
    $delivery = 0;
    $total = 0;

    $temp = array_filter ($order, function($value){
        return $value > 0;
    });
    
    if (empty($temp)){
        echo "<h2 class='emptyCart'>The Cart is Empty.</h2>";
    }
    else {
        echo "
        <table class='payment'>
            <thead>
                <tr>
                    <th colspan='2' class='tableTitle'>Meals</th>
                    <th class='tableQuantity'>Quantity</th>
                    <th class='tablePrice'>Price</th>
                </tr>
            </thead>
        <tbody>
        ";
        for ($i = 0; $i < count($order); $i++) {
            if ($_SESSION["cart"]["meal".$i] > 0) {
                $price = $meals[$i]['price'] * $order["meal".$i];
                $subtotal += $price;
                echo "
                <tr>
                    <td class='image'><img src='images/".$meals[$i]['image']."' alt=''></td>
                    <td class='title'>".$meals[$i]['title']."</td>
                    <td class='quantity'>".$order["meal".$i]."</td>
                    <td class='price'>MOP ".number_format($price, 1)."</td>
                </tr>
                ";
            }
        }
        if ($subtotal >= 500) $delivery = 0;
        else if ($subtotal >= 250) $delivery = 5;
        else if ($subtotal >= 100) $delivery = 7.5;
        else $delivery = 10;
        $total = $subtotal + $delivery;

        echo "
            </tbody>
            <tfoot>
                <tr>
                    <td class='tfootText tfootFirst' colspan='3'>Subtotal</td>
                    <td class='tfootNum tfootFirst'>MOP ".number_format($subtotal, 1)."</td>
                </tr>
                <tr>
                    <td class='tfootText' colspan='3'>Delivery Charge</td>
                    <td class='tfootNum'>MOP ".number_format($delivery, 1)."</td>
                </tr>
                <tr>
                    <td class='tfootText tfootTotal' colspan='3'>Total</td>
                    <td class='tfootNum tfootTotal'>MOP ".number_format($total, 1)."</td>
                </tr>
            </tfoot>
        </table>
        <input type='hidden' name='order_content' value='".$serialize."'>
        <input type='hidden' name='total' value=".$total.">
        ";
    }
}
?>