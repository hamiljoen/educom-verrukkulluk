<?php

class ingredient {

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }
    
    //selectie ingredient

    public function selecteerIngredient($ingredient_id) {
        
        $sql = "select * from gerecht where id = $gerecht_id";
        $return =[];
      
        $result = mysqli_query($this->connection, $sql);

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

            $artikel_id = $row ["artikel-id"];
            $artikel = $this->selecteerArtikel($artikel_id);
            $return[] = [

                "id" => $row["id"],
                "gerecht_id" => $row["gerecht_id"],
                "artikel_id" => $artikel_id,
                "aantal" => $row["aantal"],
                "naam" => $artikel["naam"],
                "omschrijving" => $artikel["omschrijving"]

            ];

            }

    private function selecteerArtikel($artikel_id) {
            
        $art = new artikel($this->connection);
        $data = $art;
        $arikel = $this->selectArtikel($art_id)

    }

        return($artikel);

    }

}

?>