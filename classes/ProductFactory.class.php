<?php

class ProductFactory {
    public static function createProduct(string $type, string $sku, string $name, float $price, array $attributes = []): Product {
        $className = ucfirst(strtolower($type));
        
        if (class_exists($className) && is_subclass_of($className, Product::class)) {
            $postData = [
                'type' => $type,
                'sku' => $sku,
                'name' => $name,
                'price' => $price
            ] + $attributes;
            
            return $className::createFromPostData($postData);
        }
        
        // Handle unknown types
        return Unknown::createFromPostData([
            'type' => $type,
            'sku' => $sku,
            'name' => $name,
            'price' => $price,
            'attributes' => $attributes
        ]);
    }
}