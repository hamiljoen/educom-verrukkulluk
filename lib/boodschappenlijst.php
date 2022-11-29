<?php

class boodschappenlijst {

    private $connection;
    private $usr;

    public function __construct($connection) {
        $this->connection = $connection;
        $this->art = new artikel ($connection);
    }
  
    public function selecteerBoodschappenlijst($artikel_id) {
        
        $sql = "SELECT * FROM artikel WHERE id = $artikel_id";

        $result = mysqli_query($this->connection, $sql);

        $boodschappenlijst = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return($boodschappenlijst);

    }

}

?>