<?php

class ingredient {

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
        $this->art = new artikel ($connection);
    }

    private function selecteerArtikel($artikel_id) {
            
        $data = $this->art->selecteerArtikel($artikel_id);
        return($data);

    }
    
    //selectie ingredient

    public function selecteerIngredient($gerecht_id) {
        
        $sql = "SELECT * FROM ingredient WHERE gerecht_id = $gerecht_id";
        $return =[];
      
        $result = mysqli_query($this->connection, $sql);

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

            $artikel_id = $row ["artikel_id"];
            $artikel = $this->selecteerArtikel($artikel_id);
            $return[] = [

                "id" => $row["id"],
                "gerecht_id" => $row["gerecht_id"],
                "artikel_id" => $artikel_id,
                "aantal" => $row["aantal"],
                "naam" => $artikel["naam"],
                "omschrijving" => $artikel["omschrijving"],
                "prijs" => $artikel["prijs"],
                "eenheid" => $artikel["eenheid"],
                "verpakking" => $artikel["verpakking"],
                "calorien" => $artikel["calorien"]

            ];

            }

        return($return);

    }

}

?>