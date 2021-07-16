<?php
    class Disc extends Product {
        private $size;
        private static $conn;
        
        public function __construct($sku, $name, $price, $size) {
            parent::__construct($sku, $name, $price);
            $this->size = $size;
            Disc::$conn = App::connect();
        }

        public function getSize() {
            return $this->size;
        }

        public function setSize($size) {
            $this->size = $size;
        }

        public function insertDisc() {
			$sku = Disc::$conn->real_escape_string($this->getSku());
            $size = Disc::$conn->real_escape_string($this->getSize());
			$query="INSERT INTO `dvd`(`product_sku`, `size`) VALUES ('$sku','$size');";
			return $query;
		}
    }

?>