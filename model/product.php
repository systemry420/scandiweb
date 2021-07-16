<?php
    class Product {
        private $sku;
        private $name;
        private $price;
        private static $conn;
    
        public function __construct($sku, $name, $price) {
            $this->sku = $sku;
            $this->name = $name;
            $this->price = $price;
            Product::$conn = App::connect();
        }

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

        public function insertProduct() {
			$sku = Product::$conn->real_escape_string($this->getSku());
			$name = Product::$conn->real_escape_string($this->getName());
			$price = Product::$conn->real_escape_string($this->getPrice());
			$query="INSERT INTO products(sku, `name`, price) VALUES ('$sku','$name','$price');";
			return $query;
		}
    }


?>