<?php

header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json");
require("./config/index.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") :
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    extract($POST);

    try {
        $prefix = ['O', 'P', 'Q', 'R'];
        $suffix = rand(1000, 9999);

        $id = $prefix[rand(0, 3)];
        $id .= $prefix[rand(0, 3)];
        $id .= $prefix[rand(0, 3)];
        $id .= $suffix;

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $type = "high";

        $query = "INSERT INTO `admin`(`id`, `username`, `password`, `email`, `type`) 
            VALUES (:id, :username, :password, :email, :type)";
        $result = $connect->prepare($query);
        $result->execute([
            "id" => $id,
            "username" => $username,
            "password" => $hashed_password,
            "email" => $email,
            "type" => $type
        ]);

        if ($result) :
            $response = [
                "status" => 201,
                "error" => null,
                "message" => "Registration Completed"
            ];
            echo json_encode($response);
        endif;
    } catch (PDOException $e) {
        $response = [
            "status" => 500,
            "error" => $e->getMessage(),
            "message" => null
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
