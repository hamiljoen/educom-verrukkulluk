<?php

class boodschappenlijst {

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }
  
    public function selecteerBoodschappenlijst($boodschappenlijst_id) {
        
        $sql = "select * from boodschappenlijst where id = $boodschappenlijst_id";
        echo $sql; 
        $result = mysqli_query($this->connection, $sql);

        $boodschappenlijst = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return($boodschappenlijst);

    }

}

?>