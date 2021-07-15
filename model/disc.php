<?php

    class Disc extends Product {
        private $size;
        
        public function __construct($sku, $name, $price, $size)
        {
            parent::__construct($sku, $name, $price);
            $this->size = $size;
        }

        public function getSize()
        {
            return $this->size;
        }

        public function setSize($size)
        {
            $this->size = $size;
        }

        public function insertDisc()
		{
			$sku = $this->conn->real_escape_string($this->getSku());
            $size = $this->conn->real_escape_string($this->getSize());
			$query="INSERT INTO dvd(sku, size) VALUES ('$sku','$size');";
			return $query;
		}

    }

?>