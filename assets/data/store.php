<?php  

require_once("./assets/handlers/config/index.php");

// ================================================ PRODUCTS =============================
// Get all Products
function getAllProducts() {
    global $connect;

    $query = "SELECT * FROM `product`";
    $result = $connect->prepare($query);
    $result->execute();

    return $result->fetchAll();
}

// Get Particular Product
function getCurrentProduct(string $id){
    global $connect;

    $query = "SELECT * FROM `product` WHERE `product_id` = ?";
    $result = $connect->prepare($query);
    $result->execute([$id]);

    return $result->fetchAll();
} 

// ======================================================= END PRODUCTS ========================================

// =================================================== COLORS ====================================================


// Get Colors
function getColors(array $colors){
    global $connect;
    $newColors = [];

    foreach($colors as $color): 
        $query = "SELECT `color_name` FROM `color` WHERE `color_id` = ?";
        $result = $connect->prepare($query);
        $result->execute([$color]);

        array_push($newColors, $result->fetch()["color_name"]);
    endforeach;

    return $newColors;
}

function getCurrentColor(string $color){
    global $connect;

    $query = "SELECT * FROM `product`";
    $result = $connect->prepare($query);
    $result->execute();
    $count = 0;

    while($row = $result->fetch()): 
        $colorArray = json_decode($row['color']);

        foreach($colorArray as $colorItem):
            $query_color = "SELECT `color_name` FROM `color` WHERE `color_id` = ?";
            $result_color = $connect->prepare($query_color);
            $result_color->execute([$colorItem]);
            $rowItem = $result_color->fetch()["color_name"];
 
            if($rowItem == $color): 
                $count++;
            endif; 
        endforeach;
    endwhile;

    return $count;
}

function getAllColor()
{
    global $connect;

    $query = "SELECT * FROM `color`";
    $result = $connect->prepare($query);
    $result->execute();

    return $result->fetchAll();
}

// ===================================================== /END COLOR ======================================================

// ===================================================== TAGS ===========================================================

// Get Tags
function getTags(array $tags){
    global $connect;
    $newTags = [];

    foreach($tags as $tag): 
        $query = "SELECT `tag_name` FROM `tag` WHERE `tag_id` = ?";
        $result = $connect->prepare($query);
        $result->execute([$tag]);

        array_push($newTags, $result->fetch()["tag_name"]);
    endforeach;

    return $newTags;
}


// Get Tag Count
function getTagCount(string $tag){
    global $connect;

    $query = "SELECT * FROM `product`";
    $result = $connect->prepare($query);
    $result->execute();
    $count = 0;

    while($row = $result->fetch()): 
        $tagArray = json_decode($row['tag']);

        foreach($tagArray as $tagItem):
            $query_tag = "SELECT `tag_name` FROM `tags` WHERE `tag_id` = ?";
            $result_tag = $connect->prepare($query_tag);
            $result_tag->execute([$tagItem]);
            $rowItem = $result_tag->fetch()["tag_name"];
 
            if($rowItem == $tag): 
                $count++;
            endif; 
        endforeach;
    endwhile;

    return $count;
}

// Get All Tags
function getAllTags() {
    global $connect;

    $query = "SELECT * FROM `tags`";
    $result = $connect->prepare($query);
    $result->execute();

    return $result->fetchAll();
}

// ============================================== /END TAGS ========================================================


// ============================================== SIZES =======================================================

// Get Sizes
function getSizes(array $sizes){
    global $connect;
    $newSizes = [];

    foreach($sizes as $size): 
        $query = "SELECT `size_name` FROM `size` WHERE `size_id` = ?";
        $result = $connect->prepare($query);
        $result->execute([$size]);

        array_push($newSizes, $result->fetch()["size_name"]);
    endforeach;

    return $newSizes;
}


function getCurrentSize(string $size){
    global $connect;

    $query = "SELECT * FROM `product`";
    $result = $connect->prepare($query);
    $result->execute();
    $count = 0;

    while($row = $result->fetch()): 
        $sizeArray = json_decode($row['size']);

        foreach($sizeArray as $sizeItem):
            $query_size = "SELECT `size_name` FROM `size` WHERE `size_id` = ?";
            $result_size = $connect->prepare($query_size);
            $result_size->execute([$sizeItem]);
            $rowItem = $result_size->fetch()["size_name"];
 
            if($rowItem == $size): 
                $count++;
            endif; 
        endforeach;
    endwhile;

    return $count;
}

function getAllSizes(){
    global $connect;

    $query = "SELECT * FROM `size`";
    $result = $connect->prepare($query);
    $result->execute();

    return $result->fetchAll();
}