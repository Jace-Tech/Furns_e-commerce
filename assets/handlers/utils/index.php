<?php

function generateId(int $lenght):string {
    $prefix = ["A", "B", "C", "D", "E", "F"];
    $randomId = $prefix[rand(0, 5)];
    $randomId .= $prefix[rand(0, 5)];

    for($i = 1; $i <= $lenght - 2; $i++):
        $randomId .= rand(0, 9);
    endfor;

    return $randomId;
}


function generatePin(int $lenght):string {
    $randomPin = "";

    for($i = 1; $i <= $lenght; $i++):
        $randomPin .= rand(0, 9);
    endfor;

    return $randomPin;
}

/**
 * @param float $amount
 * @return float $unitAmount
 *
 * Converts amount in Naira to Kobo
 */

function unitAmount($amount){
    $unitAmount = $amount * 100;
    return $unitAmount;
}

function getTotalAmount (){
    global $connect;
    $user_id = $_SESSION["USER"];

    $query = "SELECT * FROM `cart` WHERE `customer_id` = ?";
    $result = $connect->prepare($query);
    $result->execute([$user_id]);

    $totalAmount = 0;

    while($row = $result->fetch()): 
        extract($row);
        $queryProduct = "SELECT * FROM `product` WHERE `product_id` = ?";
        $resultProduct = $connect->prepare($queryProduct);
        $resultProduct->execute([$product_id]);

        $price = intval($resultProduct->fetch()["new_price"]);

        $sum = $price * intval($quantity);
        $totalAmount += $sum;
        
    endwhile;

    return $totalAmount;
}