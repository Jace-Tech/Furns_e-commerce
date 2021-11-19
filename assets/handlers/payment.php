<?php

session_start();
require_once("./config/index.php");
require_once("./utils/index.php");

$key = "ADD_YOUR_SECRET_KEY";

if(isset($_SESSION['USER'])): 
    $USERID = $_SESSION['USER'];
    // $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    // extract($POST);

    // Get Costumer's Info
    $query = "SELECT * FROM `customer` WHERE `customer_id` = ?";
    $result = $connect->prepare($query);
    $result->execute([$USERID]);

    extract($result->fetch());

    // Update Customer's Info
    // $queryInfo = "UPDATE `customer` SET `firstname` = :firstname, `lastname` = :lastname, `address` = :_address, `country` = :country, `state` = :_state WHERE `costumer_id` = :userId";
    // $resultInfo = $connect->prepare($queryInfo);
    // $resultInfo->execute([
    //     "firstname" => $firstname,
    //     "lastname" => $lastname,
    //     "_address" => $address,
    //     "country" => $country,
    //     "_state" => $state,
    //     "costumer_id" => $USERID
    // ]);

    // Api params
    $url = "https://api.paystack.co/transaction/initialize";
    $fields = [
        'email' => $email,
        'amount' => unitAmount(getTotalAmount()),
        'callback_url' => "http://localhost/furns/assets/handlers/payment.php"
    ];
    $fields_string = http_build_query($fields);

    //Open connection
    $ch = curl_init();
    
    //Set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer {$key}",
        "Cache-Control: no-cache",
    ));
    
    //So that curl_exec returns the contents of the cURL; rather than echoing it
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
    
    //Execute post
    $data = curl_exec($ch);
    $result = json_decode($data);
    $paymentUrl = $result->data->authorization_url;

    // Store data in orders table
    $orderId = generateId(12);
    $transactID = generateId(12);
    $referenceId = $result->data->reference;

    $orders = [];

    $query = "SELECT * FROM `cart` WHERE `customer_id` = ?";
    $result = $connect->prepare($query);
    $result->execute([$USERID]);

    $cartItems = $result->fetchAll();

    foreach($cartItems as $item): 
        extract($item);
        $items = [
            "product" => $product_id,
            "quantity" => $quantity
        ];
        array_push($orders, $items);
    endforeach;

    $query = "INSERT INTO `order`(`order_id`, `transact_id`, `user_id`, `orders`) VALUES (:orderId, :transactId, :userId, :orders)";
    $resultOrder = $connect->prepare($query);
    $resultOrder->execute([
        "orderId" => $orderId,
        "transactId" => $transactID,
        "userId" => $USERID,
        "orders" => json_encode($orders)
    ]);

    // Insert In Transactions Table
    $status = "pending";

    $query = "INSERT INTO `transactions`(`transact_id`, `order_id`, `reference_id`, `user_id`, `amount`, `status`) VALUES (:transactId, :orderId, :refId, :userId, :amount, :status)";
    $resultTransact = $connect->prepare($query);
    $resultTransact->execute([
        "transactId" => $transactID,
        "orderId" => $orderId,
        "refId" => $referenceId,
        "userId" => $USERID,
        "amount" => getTotalAmount(),
        "status" => $status
    ]);

    // Redirect To URL
    if($resultOrder && $resultTransact): 
        header("location: {$paymentUrl}");
    endif;

endif;



if(isset($_GET["reference"]) && isset($_GET["trxref"])): 
    $referenceId = $_GET["reference"];

    // Check if Both reference match

    // Verify Transaction
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transaction/verify/{$referenceId}",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
        "Authorization: Bearer {$key}",
        "Cache-Control: no-cache",
        ),
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    
    $result = json_decode($response);
    if($result->status):
        $status = "success";
        $USERID = $_SESSION['USER'];
        
        // Update Transaction
        $query = "UPDATE `transactions` SET `status` = :status WHERE `reference_id` = :refId";
        $result = $connect->prepare($query);
        $result->execute([
            "status" => $status,
            "refId" => $referenceId
        ]);

        if($result): 

            // Clear Cart
            $query = "DELETE FROM `cart` WHERE `customer_id` = ?";
            $result = $connect->prepare($query);
            $result->execute([$USERID]);

            if($result) header("location: ../../index.php?alert=t_s");
        endif;

    else:
        header("location: ../../index.php?alert=t_f");
    endif;

endif;
    
