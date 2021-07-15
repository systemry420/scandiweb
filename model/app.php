<?php
    class App {
        private static $servername = "localhost";
        private static $username = "root";
        private static $password = "mqgh7*eZKC5pCm82";
        private static $dbname = "product_db";

        public static function connect() {
            $conn = new mysqli(App::$servername, App::$username, App::$password, App::$dbname);
		    if(mysqli_connect_error()) {
			    trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
		    }else{
			    return $conn;
		    }
        }
    }
?>