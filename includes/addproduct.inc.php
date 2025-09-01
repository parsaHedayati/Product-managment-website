<?php
ob_start();
include("class.autoload.inc.php");

try {
    $type = $_POST['type'] ?? 'unknown';
    $sku = $_POST['sku'] ?? '';
    $name = $_POST['name'] ?? '';
    $price = isset($_POST['price']) ? (float)$_POST['price'] : 0;
    
    // Remove known fields to leave only specific attributes
    $attributes = array_diff_key($_POST, array_flip(['type', 'sku', 'name', 'price']));

    $product = ProductFactory::createProduct($type, $sku, $name, $price, $attributes);
    $productContr = new ProductContr($product);
    $productContr->setProduct();
    
    $results = ProductContr::getProducts();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit();
}

header('Location: ../index.php');
exit();
ob_end_flush();

