<?php
class Book extends Product {
    private $weight;


    public function __construct($sk,$name,$price,$weight) {
        parent::__construct($sk,$name,$price,'book');
        $this->weight = $weight;
}
public static function createFromPostData(array $postData): Product {
    $weight = isset($postData['book']) ? (float)$postData['book'] : (isset($postData['weight']) ? (float)$postData['weight'] : 0);
    return new self($postData['sku'], $postData['name'], (float)$postData['price'], $weight);
}
public function setweight($weight) {
    $this->weight = is_array($weight) ? (float)($weight['weight'] ?? 0):(float)$weight;
}
public function getAttributes(): array {
    return [ 'weight' => $this->weight];
}
public function setAttributes(array $attributes){
    $this ->setweight($attributes['weight'] ?? 0);
}
public function displayAttributes(): string {
    return "Weight: " . $this->weight . " KG";
}


}
