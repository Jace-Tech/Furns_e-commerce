<?php

// require_once("./assets/handlers/config/index.php");


if(isset($USER_ID)): 
    $query = "SELECT * FROM `customer` WHERE `customer_id` = ?";
    $result = $connect->prepare($query);
    $result->execute([$USER_ID]);

    extract($result->fetch());
    
endif;