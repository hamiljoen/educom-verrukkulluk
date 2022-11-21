<?php

class info {

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }
  
    public function selecteerInfo($info_id) {
        
        $sql = "select * from gerecht where id = $gerecht_id";

        while ($row = fetcharray)

        $result = mysqli_query($this->connection, $sql);

        // $info = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return($info_id);

    }

}

?>