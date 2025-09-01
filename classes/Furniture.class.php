<?php 
class Furniture extends Product {
    private $height;
    private $width;
    private $length;

    public function __construct($sku,$name,$price,array $attributes) {
        parent::__construct($sku,$name,$price,'furniture');
        $this->setAttributes($attributes);
    }   
    public static function createFromPostData(array $postData): Product {
        $attributes = [
            'height' => (float)($postData['height'] ?? 0),
            'width' => (float)($postData['width'] ?? 0),
            'length' => (float)($postData['length'] ?? 0)
        ];
        return new self($postData['sku'], $postData['name'], (float)$postData['price'], $attributes);
    }
    public function getAttributes(): array {
        return[
        'height' => $this -> height,
        'width' => $this -> width,
        'length' => $this -> length,
        ];
    }
    public function setAttributes(array $attributes){
        $this->height = $attributes['height'] ?? null;
        $this->width = $attributes['width'] ?? null;
        $this->length = $attributes['length'] ?? null;
    }
    public function displayAttributes(): string {
        return "Dimensions:{$this->height}x{$this->width}x{$this->length}";
    }
}







