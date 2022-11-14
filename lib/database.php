<?php 

// Aanpassen naar je eigen omgeving
define("USER", "randy");
define("PASSWORD", "root");
define("DATABASE", "ver2");
define("HOST", "localhost");

class database {

    private $connection;

    public function __construct() {
       $this->connection = mysqli_connect(
        HOST, USER, PASSWORD, DATABASE );
    }

    public function getConnection() {
        return($this->connection);
    }

}

?>