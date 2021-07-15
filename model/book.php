<?php
    class Book extends Product {
        private $weight;
        private static $conn;
        
        public function __construct($sku, $name, $price, $weight) {
            parent::__construct($sku, $name, $price);
            $this->weight = $weight;
            Book::$conn = App::connect();
        }

        public function getWeight() {
            return $this->weight;
        }

        public function setWeight($weight) {
            $this->weight = $weight;
        }
        
        public function insertBook() {
			$sku = Book::$conn->real_escape_string($this->getSku());
            $weight = Book::$conn->real_escape_string($this->getWeight());
			$query= "INSERT INTO `books`(`product_sku`, `weight`) VALUES ('$sku', '$weight');";
			return $query;
		}
    }

?>