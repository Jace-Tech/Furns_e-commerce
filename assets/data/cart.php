<?php

require_once("./assets/handlers/config/index.php");

function discountCheck(){
    global $connect;
    $user_id = $_SESSION["USER"];

    $queryCoupon = "SELECT * FROM `cart` WHERE `customer_id` = ?";
    $resultCoupon = $connect->prepare($queryCoupon);
    $resultCoupon->execute([$user_id]); 

    $cartItems = $resultCoupon->fetchAll()[0];
    extract($cartItems);

    if($coupon):
        return true;
    endif;

    return false;
}


function getDiscount () {
    global $connect;
    $user_id = $_SESSION["USER"];

    $queryCoupon = "SELECT * FROM `cart` WHERE `customer_id` = ?";
    $resultCoupon = $connect->prepare($queryCoupon);
    $resultCoupon->execute([$user_id]); 

    $cartItems = $resultCoupon->fetchAll()[0];
    extract($cartItems);

    $query = "SELECT `discount` FROM `coupon` WHERE `coupon_code` = ?";
    $result = $connect->prepare($query);
    $result->execute([$coupon]);

    $discount = $result->fetch()["discount"];
    return $discount;
}


function getCartItems (){
    global $connect;
    $user_id = $_SESSION["USER"];

    $query = "SELECT * FROM `cart` WHERE `customer_id` = ?";
    $result = $connect->prepare($query);
    $result->execute([$user_id]);

    return $result->fetchAll();
}

function getCartCount (){
    global $connect;
    $user_id = $_SESSION["USER"];

    $query = "SELECT * FROM `cart` WHERE `customer_id` = ?";
    $result = $connect->prepare($query);
    $result->execute([$user_id]);

    $totalCount = 0;

    while($row = $result->fetch()): 
        extract($row);
        // $queryProduct = "SELECT * FROM `product` WHERE `product_id` = ?";
        // $resultProduct = $connect->prepare($queryProduct);
        // $resultProduct->execute([$product_id]);

        // $price = $resultProduct->fetch()["new_price"];

        $totalCount += intval($quantity);
    endwhile;

    return $totalCount;
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

