<?php
include 'includes/class.autoload.inc.php';

header('Content-Type: application/json');

ini_set('display_errors', 1);
ini_set('log_errors', 1);
error_reporting(E_ALL);
ini_set('error_log', 'delete_error.log');

$input = json_decode(file_get_contents('php://input'), true);
$skus = $input['skus'] ?? [];

error_log('Received SKUs: ' . print_r($skus, true));

if (empty($skus)) {
    echo json_encode(['success' => false, 'message' => 'No SKUs provided']);
    exit;
}

try {
    error_log('Attempting to delete products with SKUs: ' . implode(', ', $skus));
    $deletedCount = ProductContr::deleteProduct($skus);
    error_log("Deletion attempt complete. Deleted count: $deletedCount");
    
    if ($deletedCount > 0) {
        echo json_encode(['success' => true, 'message' => "$deletedCount products deleted"]);
    } else {
        echo json_encode(['success' => false, 'message' => 'No products were deleted']);
    }
} catch (Exception $e) {
    error_log('Error in delete.php: ' . $e->getMessage());
    error_log('Stack trace: ' . $e->getTraceAsString());
    echo json_encode(['success' => false, 'message' => 'Error deleting products: ' . $e->getMessage()]);
}
