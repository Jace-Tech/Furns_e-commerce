<?php

session_start();
session_destroy();

if(isset($_COOKIE["ADMIN"])): 
    $time = -(strtotime("24hrs") + time());
    setcookie("ADMIN", "Nothing", $time, "/");
endif;

header("location: ../index.php");