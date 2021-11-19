<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once("./config/index.php");

if ($_SERVER["REQUEST_METHOD"] === 'POST') :
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    extract($POST);

    try {
        $query = "SELECT `password`, `id` FROM `admin` WHERE `username` = :username OR `email` = :username";
        $result = $connect->prepare($query);
        $result->execute(['username' => $username]);

        if($result->rowCount() > 0):  
            $rows = $result->fetchAll();

            $hashed_password = $rows[0]['password'];

            if (!password_verify($password, $hashed_password)) :
                throw new PDOException("Incorrect Password!", 1);
            endif;

            extract($rows[0]);

            session_start();
            $_SESSION["ADMIN"] = $id;

            $response = [
                "status" => 200,
                "message" => "Logged in successfully",
                "error" => null
            ];
            echo json_encode($response);

        else:
            throw new PDOException("Email does not exist", 1);
        endif;
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
