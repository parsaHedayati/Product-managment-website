<?php
abstract class Product Extends Dbh {
    protected $sku ; 
    protected $name;
    protected $price;
    protected $type;

    public function __construct($sku, $name, $price, $type) {
        $this->setSku($sku);
        $this->setName($name);
        $this->setPrice($price);
        $this->type = $type;

}
    abstract public static function createFromPostData(array $postData): Product;
    abstract public function getAttributes(): array;
    abstract public function setAttributes(array $attributes);
    abstract public function displayAttributes(): string;
public function getSku() {
    return $this->sku;
}

public function setSku($sku) {
    $this->sku = $sku;
}

public function getName() {
    return $this->name;
}

public function setName($name) {
    $this->name = $name;
}

public function getPrice() {
    return $this->price;
}
public function setPrice($price) {
    $this->price = $price;
}


public function saveToDatabase() {
    $conn = $this->connect();
    
    $attributes = $this->getAttributes();
    $columns = array_keys($attributes);
    $values = array_values($attributes);

    $sql = "INSERT INTO products (sku, name, price, type, " . implode(', ', $columns) . ") 
            VALUES (?, ?, ?, ?, " . implode(', ', array_fill(0, count($columns), '?')) . ")";

    try {
        $stmt = $conn->prepare($sql);
        
        $params = array_merge([$this->getSku(), $this->getName(), $this->getPrice(), $this->type], $values);
        $stmt->execute($params);

        return true;
    } catch (PDOException $e) {
        error_log("Database Error: " . $e->getMessage());
        throw new Exception("Failed to save product to database");
    }
}
public static function getAll() {
    $dbh = new Dbh();
    $sql = "SELECT * FROM products";
    $stmt = $dbh->connect()->prepare($sql);
    $stmt->execute();

    $results = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $type = $row['type'] ?? 'unknown';
        $attributes = array_diff_key($row, array_flip(['sku', 'name', 'price', 'type']));
        
        try {
            $results[] = ProductFactory::createProduct(
                $type,
                $row['sku'],
                $row['name'],
                (float)$row['price'],
                $attributes
            );
        } catch (InvalidArgumentException $e) {
            error_log("Error creating product: " . $e->getMessage());
            continue;
        }
    }

    return $results;
}




}