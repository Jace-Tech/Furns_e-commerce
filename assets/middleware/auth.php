<?php

if(!isset($_SESSION["USER"])): 
    header("location: ./index.php?alert=login");
endif;