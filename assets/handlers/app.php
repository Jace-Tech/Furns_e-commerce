<?php

require_once("./config/index.php");
require_once("./utils/index.php");

$couponCode = generatePin(10);
$discounts = [5, 10, 20, 50];
$discount = $discounts[rand(0, 3)];
$date = date("Y-m-d G:i:s");


$query = "INSERT INTO `coupon` (`coupon_code`, `discount`, `usage_count`, `date`) 
VALUES (:couponCode, :discount, :usage, :date)";
$result = $connect->prepare($query);
$result->execute([
    "couponCode" => $couponCode,
    "discount" => $discount,
    "usage" => 0,
    "date" => $date
]);

if($result) echo "STORED!!";