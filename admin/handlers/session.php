<?php

session_start();

if (!isset($_SESSION["ADMIN"])) :
    header("location: ./index.php");
    exit();
endif;

$ADMIN_ID = $_SESSION["ADMIN"];
