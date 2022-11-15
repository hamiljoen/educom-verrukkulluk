<?php

class waardering {

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }
  
    public function selecteerWaardering($user_id) {
        
        $sql = "select * from waardering where id = $waardering_id";
        echo $sql; 
        $result = mysqli_query($this->connection, $sql);

        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return($waardering);

    }

}

?>