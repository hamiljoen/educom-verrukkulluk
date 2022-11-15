<?php

class type {

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }
  
    public function selecteerType($type_id) {
        
        $sql = "select * from type where id = $type_id";
        echo $sql; 
        $result = mysqli_query($this->connection, $sql);

        $type = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return($type);

    }

}

?>