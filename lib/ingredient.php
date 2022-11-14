<?php

class artikel {

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }
  
    public function selecteerArtikel($artikel_id) {
        
        $sql = "select * from artikel where id = $artikel_id";
        echo $sql; 
        $result = mysqli_query($this->connection, $sql);

        // $artikel = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return($data);

    }

    public function searchArtikel(){
        $id = 'Burger';
        $sql = "SELECT * FROM artikel WHERE name LIKE '%$id%' ";

        $data = [];

        $result = mysqli_query($this->connection, $sql);

        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $artikel_id = $row["id"];
            $data[] = $row;
        }

        return($data);
    }

}

?>