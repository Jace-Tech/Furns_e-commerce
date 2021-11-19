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
        $query = "SELECT `password`, `user_id` FROM `login` 
            WHERE `username` = :username OR `email` = :username";
        $result = $connect->prepare($query);
        $result->execute([
            "username" => $username
        ]);

        if (!$result) :
            throw new PDOException("Username does not exist", 404);
        endif;

        $row = $result->fetch();
        $hashed_password = $row["password"];

        if (!password_verify($password, $hashed_password)) :
            throw new PDOException("Incorrect Password", 404);
        endif;

        session_start();
        $_SESSION["USER"] = $row["user_id"];

        $response = [
            "status" => 200,
            "message" => "Logged in",
            "error" => null
        ];
        echo json_encode($response);
    } catch (PDOException $e) {
        $response = [
            "status" => 404,
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
