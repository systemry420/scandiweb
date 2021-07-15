<?php
    class Furniture extends Product {
        private $height;
        private $width;
        private $length;
        private static $conn;
        
        public function __construct($sku, $name, $price, $height, $width, $length) {
            parent::__construct($sku, $name, $price);
            $this->height = $height;
            $this->width = $width;
            $this->length = $length;
            Furniture::$conn = App::connect();
        }

        public function getHeight() {
            return $this->height;
        }

        public function setHeight($height) {
            $this->height = $height;
        }

        public function getWidth() {
            return $this->width;
        }

        public function setWidth($width) {
            $this->width = $width;
        }

        public function getLength() {
            return $this->length;
        }

        public function setLength($length) {
            $this->length = $length;
        }

                
        public function insertFurniture() {
			$sku = Furniture::$conn->real_escape_string($this->getSku());
            $height = Furniture::$conn->real_escape_string($this->getHeight());
            $width = Furniture::$conn->real_escape_string($this->getWidth());
            $length = Furniture::$conn->real_escape_string($this->getLength());
			$query= "INSERT INTO `furniture`(`product_sku`, `height`, `width`, `length`) VALUES ('$sku', '$height', $width, $length);";
			return $query;
		}
    }

?>