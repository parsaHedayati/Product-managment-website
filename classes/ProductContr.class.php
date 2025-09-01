<?php
class ProductContr extends Dbh {
    private $product;

    public function __construct(Product $product) {
        $this->product = $product;
    }

    public function setProduct() {
        if($this->checkEmpty() == false) {
            throw new Exception("Empty input");
        }
        elseif($this->skuChecking() == false) {
            throw new Exception("Duplicate SKU");
        } 
        else {
            $this->product->saveToDatabase();
        }
    }
    private function checkEmpty() {
        return !empty(($this->product)->getSku()) && !empty(($this->product)->getName()) && !empty(($this->product)->getPrice());
}
private function skuChecking() {
    $sku = $this->product->getSku();
    
    $dbh = new Dbh();
    $conn = $dbh->connect();
    
    $sql = "SELECT * FROM products WHERE sku = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$sku]);
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    

    
    return $result === false;
}


public static function getProducts() {
    return Product::getAll();
}
public static function deleteProduct($skus) {
    try {
        $dbh = new Dbh();
        $conn = $dbh->connect();
        $sql = "DELETE FROM products WHERE sku IN (" . implode(',', array_fill(0, count($skus), '?')) . ")";
        error_log("Executing SQL: $sql");
        error_log("With parameters: " . implode(', ', $skus));
        $stmt = $conn->prepare($sql);
        $stmt->execute($skus);
        $rowCount = $stmt->rowCount();
        error_log("Rows affected: $rowCount");
        return $rowCount;
    } catch (PDOException $e) {
        error_log('Database error in deleteProduct: ' . $e->getMessage());
        throw new Exception('Database error occurred while deleting products');
    }
}


}