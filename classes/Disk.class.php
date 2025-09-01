<?php
class Disk extends Product {
    private $size;


    public function __construct($sk,$name,$price,$size) {
        parent::__construct($sk,$name,$price,'disk');
        $this->size = $size;
}

public static function createFromPostData(array $postData): Product {
    $size = isset($postData['disk']) ? (float)$postData['disk'] : (isset($postData['size']) ? (float)$postData['size'] : 0);
    return new self($postData['sku'], $postData['name'], (float)$postData['price'], $size);
}

public function setSize($size) {
    $this->size = is_array($size) ? (float)($size['size'] ?? 0):(float)$size;
}
public function getAttributes(): array {
    return [ 'size' => $this->size];
}
public function setAttributes(array $attributes){
    $this ->setSize($attributes['size'] ?? 0);
}
public function displayAttributes(): string {
    return "Size: " . $this->size . " MB";
}

}
