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
    
    //    addFavoriet ($gerecht_id, $record_type)

    public function addFavoriet($gerecht_id, $record_type) {

        $sql = "INSERT INTO info (gerecht_id, record_type, user_id)\n";
        $return = [];

        $result = mysqli_query($this->connection, $sql);
        $arr = [];

    }

        //    deleteFavoriet ($gerecht_id, $record_type)

        public function deleteFavoriet($gerecht_id, $record_type) {

            $sql = "DELETE O FROM info WHERE record_type = '$record_type'";
    
            $result = mysqli_query($this->connection, $sql);
            $arr = [];
    
        }

    //      selectie ingredient info

    public function selecteerInfo($gerecht_id, $record_type) {
        
        $sql = "SELECT * FROM info WHERE gerecht_id = '$gerecht_id' AND record_type = '$record_type'";
        $return = [];

        $result = mysqli_query($this->connection, $sql);
        $arr = [];

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

                if ($record_type == "O" || $record_type == "F") { 
                    $user_id = $row ["user_id"];
                    $user = $this->usr->selecteerUser($user_id);
                    $arr[] = [

                        "id" => $row["id"],
                        "gerecht_id" => $row ['gerecht_id'],
                        "record_type" => $row['record_type'],
                        "user_id" => $row['user_id'],
                        "datum" => $row['datum'],
                        "user" => $user,
                        "nummeriekveld" => $row['nummeriekveld'],
                        "tekstveld" => $row['tekstveld']

                    ];


             return($arr);
    }       

            return($arr);


}
    }}
?>