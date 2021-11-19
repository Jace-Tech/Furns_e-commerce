<?php

session_start();
require_once("./config/index.php");
require_once("./utils/index.php");

if(!isset($_SESSION["USER"])): 
    header("location: ../../index.php");
    die();
endif;


// CREATE
if(!isset($_GET['id'])): 
    header("location: ../../shop.php");
else:
    $productId = $_GET['id'];
    $custumerId = $_SESSION["USER"];
    $cartId = generateId(8);

    // Check If Product Exists
    $query = "SELECT * FROM `cart` WHERE `product_id` = :productId AND `customer_id` = :customerId";
    $result = $connect->prepare($query);
    $result->execute([
        'productId' => $productId,
        'customerId' => $custumerId
    ]);

    if($result->rowCount() > 0):
        $row = $result->fetch();
        $cart_id = $row["cart_id"];
        $quantity = intval($row["quantity"]) + 1;

        // Update The Quantity
        $query = "UPDATE `cart` SET `quantity` = :quantity WHERE `cart_id` = :cartId";
        $result = $connect->prepare($query);
        $result->execute([
            'quantity' => $quantity,
            'cartId' => $cart_id
        ]);

        if($result) :
            header("location: ../../shop.php?alert=p_a");
        endif;

    else:
        $quantity = 1;

        // Insert A New Product
        $query = "INSERT INTO `cart`(`cart_id`, `product_id`, `customer_id`, `quantity`) 
        VALUES (:cartId, :productId, :customerId, :quantity)";
        $result = $connect->prepare($query);
        $result->execute([
            'cartId' => $cartId,
            'productId' => $productId,
            'customerId' => $custumerId,
            'quantity' => $quantity
        ]);

        if($result) :
            header("location: ../../shop.php");
        endif;
    endif;
endif;


// DELETE
if(!isset($_GET["del_id"])): 
    header("location: ../../shop.php");
else: 
    $cartId = $_GET["del_id"];

    $query = "DELETE FROM `cart` WHERE `cart_id` = ?";
    $result = $connect->prepare($query);
    $result->execute([$cartId]);

    if($result) header("location: ../../cart.php");
endif;


// COUPON
if(isset($_POST['coupon'])): 
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    extract($POST);

    $id = $_SESSION["USER"];

    $query = "SELECT * FROM `coupon` WHERE `coupon_code` = ?";
    $result = $connect->prepare($query);
    $result->execute([$couponCode]);

    if($result->rowCount() < 1): 
        header("location: ../../cart.php?alert=cou_de");
    else:
        $query = "UPDATE `cart` SET `coupon` = :coupon WHERE `customer_id` = :id";
        $result = $connect->prepare($query);
        $result->execute([
            "coupon" => $couponCode,
            "id" => $id
        ]);

        if($result) header("location: ../../cart.php");
    endif;

endif;