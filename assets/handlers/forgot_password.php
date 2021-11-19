<?php

require_once("./config/index.php");
require_once("./utils/index.php");

if(isset($_POST["submit"])):
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    extract($POST);

    //  Check if user exists
    $query = "SELECT * FROM `customer` WHERE `email` = ?";
    $result = $connect->prepare($query);
    $result->execute([$email]);

    if($result->rowCount() > 0):
        $PIN = generatePin(6);
        $FORGOT_ID = generateId(10);
        $time = strtotime("30mins") + time();
        setcookie("FORGOT_ID", $FORGOT_ID, $time, "/");

        // Insert in database
        $query = "INSERT INTO `forgot_password`(`forgot_id`, `email`, `pin`) VALUES (:forgotId, :email, :pin)";
        $result = $connect->prepare($query);
        $result->execute([
            "forgotId" => $FORGOT_ID,
            "email" => $email,
            "pin" => $PIN
        ]);

        if($result): 
            // Send Email
            $handler = fopen("text.txt", 'a+');
            fwrite($handler, $PIN . "\n");
            fclose($handler);
            
            // Redirect User
            header("location: ../../pin.php");
        endif;

    else:
        header("location: ../../forgot_password.php?alert=ue_f");
    endif;
endif;


if(isset($_POST["token"])):
    $PIN = trim($_POST["pin"]);

    // Check Cookie
    if(isset($_COOKIE["FORGOT_ID"])):
        $FORGOT_ID = $_COOKIE["FORGOT_ID"];

        $query = "SELECT `pin` FROM `forgot_password` WHERE `forgot_id` = ?";
        $result = $connect->prepare($query);
        $result->execute([$FORGOT_ID]);

        $RealPin = $result->fetch()["pin"];

        if($PIN === $RealPin):
            header("location: ../../change_password.php");
        else:
            header("location: ../../pin.php?alert=p_f");
        endif;
        
    else:
        header("location: ../../login.php?alert=cookie_e");
    endif;
endif;


if(isset($_POST["change"])):
    $password = trim($_POST["password"]);

    if (isset($_COOKIE["FORGOT_ID"])) :
        $FORGOT_ID = $_COOKIE["FORGOT_ID"];

        // Hash and Store New Password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "SELECT `email` FROM `forgot_password` WHERE `forgot_id` = ?";
        $result = $connect->prepare($query);
        $result->execute([$FORGOT_ID]);

        $email = $result->fetch()["email"];

        $query = "UPDATE `login` SET `password` = :password WHERE `email` = :email";
        $result = $connect->prepare($query);
        $result->execute([
            "password" => $hashedPassword,
            "email" => $email
        ]);

        if($result) : 
            $query = "DELETE FROM `forgot_password` WHERE `forgot_id` = ?";
            $result = $connect->prepare($query);
            $result->execute([$FORGOT_ID]);

            // Destroy COOKIE
            $time = -(strtotime("30mins") + time());
            setcookie("FORGOT_ID", "nothing", $time, "/");

            header("location: ../../login.php?alert=pc_s");
        endif;

    else:
        header("location: ../../login.php?alert=cookie_e");
    endif;
endif;
