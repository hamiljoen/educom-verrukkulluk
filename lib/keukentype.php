<?php

class keukentype {

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }
  
    public function selecteerKeukenType ($keukentype_id) {
        
        $sql = "SELECT * FROM keukentype WHERE id = $keukentype_id";

        $result = mysqli_query($this->connection, $sql);

        $keuken = mysqli_fetch_array($result, MYSQLI_ASSOC);
 
        return($keukentype);

    }

}

?>