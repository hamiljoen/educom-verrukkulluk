<?php

class info {

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
        $this->art = new artikel ($connection);
    }

    private function selecteerArtikel($artikel_id) {
            
        $data = $art->selecteerArtikel($artikel_id);
        return($data);

    }
    
    //selectie ingredientinfo

    public function selecteerInfo($info_id) {
        
        $sql = "select * from gerecht where id = $gerecht_id";
        $return =[];
      
        $result = mysqli_query($this->connection, $sql);

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

            $artikel_id = $row ["artikel_id"];
            $artikel = $this->selecteerArtikel($artikel_id);
            $return[] = [

                "id" => $row["id"],
                "record_type" => $row["record_type"],
                "gerecht_id" => $gerecht_id,
                "userd_id" => $row["aantal"],
                "datum" => $row["datum"],
                "nummeriekveld" => $row["nummeriekveld"],
                "tekstveld" => $row["tekstveld"]

            ];

            }

        return($artikel);

    }

}

?>