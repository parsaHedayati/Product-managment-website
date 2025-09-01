<?php
class ProductView {
    private $products;

    public function __construct() {
        $this->products = ProductContr::getProducts();
    }

    public function displayProducts() {
        if (empty($this->products)) {
            echo "No products found.";
            return;
        }
        foreach ($this->products as $product) {
            $this->displayProduct($product);
        }
    }

    private function displayProduct($product) {
        echo "<div class='product'>";
        echo "<div class='form-check'>";
        echo "<input class='form-check-input delete-checkbox' type='checkbox' value='" . htmlspecialchars($product->getSku()) . "' id='checkbox_" . htmlspecialchars($product->getSku()) . "'>";
        echo "</div>";
        echo "SKU: " . htmlspecialchars($product->getSku()) . "<br>";
        echo "Name: " . htmlspecialchars($product->getName()) . "<br>";
        echo "Price: $" . number_format($product->getPrice(), 2) . "<br>";
        echo $product->displayAttributes() . "<br>";
        echo "</div><br>";
    }
    public function deleteProducts($skus) {
        foreach ($skus as $sku) {
            ProductContr::deleteProduct($sku);
        }
        // Refresh the products list after deletion
        $this->products = ProductContr::getProducts();
    }

}
