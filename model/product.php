<?php
    class Product {
        private $sku;
        private $name;
        private $price;
        public $conn;
        private $servername = "localhost";
        private $username = "root";
        private $password = "mqgh7*eZKC5pCm82";
        private $dbname = "product_db";
    
        public function __construct($sku, $name, $price)
        {
            $this->sku = $sku;
            $this->name = $name;
            $this->price = $price;
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		    if(mysqli_connect_error()) {
			    trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
		    }else{
			    return $this->conn;
		    }
        }   

        public function getSku()
        {
            return $this->sku;
        }

        public function setSku($sku)
        {
            $this->sku = $sku;
        }

        public function getName()
        {
            return $this->name;
        }

        public function setName($name)
        {
            $this->name = $name;
        }

        public function getPrice()
        {
            return $this->price;
        }

        public function setPrice($price)
        {
            $this->price = $price;
        }

        public function insertProduct()
		{
			$sku = $this->conn->real_escape_string($this->getSku());
			$name = $this->conn->real_escape_string($this->getName());
			$price = $this->conn->real_escape_string($this->getPrice());

			$query="INSERT INTO products(sku, `name`, price) VALUES ('$sku','$name','$price');";
			return $query;
		}
    }


?>