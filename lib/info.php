<?php

class info {

    private $connection;

    private $usr;

    public function __construct($connection) {
        $this->connection = $connection;
        $this->usr = new user ($connection);
    }

    private function selecteerArtikel($artikel_id) {
            
        $data = $art->selecteerArtikel($artikel_id);
        return($data);

    }
    
    //selectie ingredientinfo

    public function selecteerInfo($gerecht_id, $record_type) {
        
        $sql = "SELECT * FROM info WHERE gerecht_id = '$gerecht_id' AND record_type = '$record_type'";
        $result = mysqli_query($this->connection, $sql);
        $arr = [];

            if ($record_type == "O") {
            
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

                    $user_id = $row ["user_id"];
                    $user = $this->usr->selecteerUser($user_id);
                    $arr[] = [

                        "id" => $row["id"],
                        "gerecht_id" => $row ['gerecht_id'],
                        "record_type" => $row['record_type'],
                        "user_id" => $row['user_id'],
                        "datum" => $row["datum"],
                        "nummeriekveld" => $row['nummeriekveld'],
                        "tekstveld" => $row['tekstveld']

                    ];

                }

                }

                if ($record_type == "F") {
            
                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    
                        $user_id = $row ["user_id"];
                        $user = $this->usr->selecteerUser($user_id);
                        $arr[] = [
    
                            "id" => $row["id"],
                            "gerecht_id" => $row ['gerecht_id'],
                            "record_type" => $row['record_type'],
                            "user_id" => $row['user_id'],
                            "datum" => $row["datum"],
                            "nummeriekveld" => $row['nummeriekveld'],
                            "tekstveld" => $row['tekstveld']
    
                        ];

        return($arr);

    }

}
    }}
?>