<?php

// Prevent CORs Errors and Convert file to JSON 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Include the connection
require_once("./config/index.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") :
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    extract($POST);

    try {
        $prefix = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I'];
        $suffix = rand(10000000000000, 99999999999999);
        $id = $prefix[rand(0, 8)] . $prefix[rand(0, 8)] . $suffix;

        $query = "INSERT INTO `customer`(`customer_id`, `email`) VALUES (:id, :email)";
        $result = $connect->prepare($query);
        $result->execute([
            "id" => $id,
            "email" => $email
        ]);

        if (!$result) :
            throw new PDOException("Error from customer table");
        endif;

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO `login`(`user_id`, `email`, `username`, `password`) VALUES (:id, :email, :username, :password)";
        $result = $connect->prepare($query);
        $result->execute([
            "id" => $id,
            "email" => $email,
            "username" => $username,
            "password" => $hashed_password
        ]);

        if (!$result) :
            throw new PDOException("Error from login table");
        endif;

        $response = [
            "status" => 201,
            "message" => "Registration Completed",
            "error" => null
        ];
        echo json_encode($response);
    } catch (PDOException $e) {
        $response = [
            "status" => 500,
            "message" => null,
            "error" => $e->getMessage()
        ];
        echo json_encode($response);
    }
else :
    $response = [
        "status" => 400,
        "error" => "Bad Request",
        "message" => null
    ];
    echo json_encode($response);
endif;
