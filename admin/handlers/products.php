<?php

header("Access-Conrol-Allow-Origin: *");
header("Content-Type: application/json");

require_once("./config/index.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") :

    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

    extract($POST);

try {
    $prefix = ['J', 'K', 'L', 'M', 'N', 'O'];
    $suffix = rand(10000000, 999999999);
    $product_id = $prefix[rand(0, 5)] . $prefix[rand(0, 5)] . $suffix;

    $destination = "../images/products/";
    $filenames = [];
    $random = time();


    for ($i = 0; $i < count($_FILES['image']['name']); $i++) :
        $filename = $_FILES['image']['name'][$i];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);

        $filename .= $random . '.' . $ext;
        $file = $_FILES['image']['tmp_name'][$i];

        if (!move_uploaded_file($file, $destination . $filename)) throw new PDOException("Error processing file -> {$filename}", 1);

        array_push($filenames, $filename);
    endfor;

    $query = "INSERT INTO `product`(`product_id`, `image`, `product_name`, `old_price`, `new_price`, `product_details`, `product_description`, `color`, `size`, `dimensions`, `weight`, `stock_quantity`, `material`, `tag`) 
    VALUES (:productId, :image, :productName, :oldPrice, :newPrice, :productDetails, :productDescription, :color, :size, :dimensions, :weight, :quantity, :material, :tag)";
    $result = $connect->prepare($query);
    $result->execute([
        'productId' => $product_id,
        'image' => json_encode($filenames),
        'productName' => $productName,
        'oldPrice' => $oldPrice,
        'newPrice' => $newPrice,
        'productDetails' => $productDetails,
        'productDescription' => $productDescription,
        'color' => json_encode($color),
        'size' => json_encode($size),
        'dimensions' => $dimensions,
        'weight' => $weight,
        'quantity' => $quantity,
        'material' => $material,
        'tag' => json_encode($tags)
    ]);

    if (!$result) throw new PDOException("Something went wrong", 1);

    header('location: ../add_product.php?alert=product_added');
} catch (PDOException $e) {
    header('location: ../add_product.php?alert=e&err=' . $e->getMessage());
}
endif;