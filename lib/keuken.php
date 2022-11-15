<?php

class keuken {

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }
  
    public function selecteerKeuken($keuken_id) {
        
        $sql = "select * from keuken where id = $keuken_id";
        echo $sql; 
        $result = mysqli_query($this->connection, $sql);

        $keuken = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return($keuken);

    }

}

?>