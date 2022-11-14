<?php

class keukentype {

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }
  
    public function selecteerKeukentype($keukentype_id) {
        
        $sql = "select * from keukentype where id = $keukentype_id";
        echo $sql; 
        $result = mysqli_query($this->connection, $sql);

        $keukentype = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return($keukentype);

    }

}

?>