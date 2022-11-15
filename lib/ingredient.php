<?php

class ingredient {

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }
  
    public function selecteerArtikel($ingredient_id) {
        
        $sql = "select * from ingredient where id = $ingredient_id";
        echo $sql; 
        $result = mysqli_query($this->connection, $sql);

        // $artikel = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return($data);

    }

    public function searchArtikel(){
        $id = 'Avocado';
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