<?php
class Unknown extends Product {
    private $attributes;
    public function __construct($sku, $name, $price, $type,array $attributes = []) {
        parent::__construct($sku, $name, $price, $type);
        $this->attributes = $attributes;
    }

    public function getAttributes(): array {
        return [];
    }

    public function setAttributes(array $attributes) {
        // Do nothing for generic products
    }

    public function displayAttributes(): string {
        return "Unknown product type";
    }
    public static function createFromPostData(array $postData): Product {
        $type = $postData['type'] ?? 'unknown';
        $attributes = array_diff_key($postData, array_flip(['sku', 'name', 'price', 'type']));
        return new self($postData['sku'], $postData['name'], (int)$postData['price'], $type, $attributes);
    }
}