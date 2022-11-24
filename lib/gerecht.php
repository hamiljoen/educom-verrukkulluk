<?php

class gerecht {

    private $connection;
    private $usr;

    public function __construct($connection) {
        $this->connection = $connection;
        $this->usr = new user ($connection);
        $this->ing = new ingredient ($connection);
    }

    //      selecteer User

    public function selectUser($user_id) {
            
        $user = $this->usr->selecteerUser($user_id);
        return($user);

    }


    //      selecteer Ingredient

    public function selectIngredient($ingredient_id) {
            
        $ingredient = $this->ing->selecteerIngredient($ingredient_id);
        return($ingredient);
    
    }

    //      selectie Waardering

    public function selecteerRating($record_type) {
        
        $sql = "SELECT * FROM info WHERE record_type = 'W'";
        $return = [];

        $result = mysqli_query($this->connection, $sql);
        $arr = [];

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

                if ($record_type == "W") { 
                    $user_id = $row ["user_id"];
                    $arr[] = [

                        "id" => $row["id"],
                        "gerecht_id" => $row ['gerecht_id'],
                        "record_type" => $row['record_type'],
                        "user_id" => $row['user_id'],
                        "datum" => $row['datum'],
                        "nummeriekveld" => $row['nummeriekveld'],       
                        "tekstveld" => $row['tekstveld']

                    ];

             return($arr);
    }

} }

    //      selectie Bereidingswijze

    public function selectSteps($record_type) {
        
        $sql = "SELECT * FROM info WHERE record_type = 'B'";
        $return = [];

        $result = mysqli_query($this->connection, $sql);
        $arr = [];

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

                if ($record_type == "B") { 
                    $user_id = $row ["user_id"];
                    $arr[] = [

                        "id" => $row["id"],
                        "gerecht_id" => $row ['gerecht_id'],
                        "record_type" => $row['record_type'],
                        "user_id" => $row['user_id'],
                        "datum" => $row['datum'],
                        "nummeriekveld" => $row['nummeriekveld'],       
                        "tekstveld" => $row['tekstveld']

                    ];

             return($arr);
    }

} }


    //selectie gerecht

    public function selecteerGerecht($user_id) {
        
        $sql = "SELECT * FROM user WHERE id = $user_id";
        $return =[];
      
        $result = mysqli_query($this->connection, $sql);

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){


            $user = $this->selectUser($user_id);
            $return[] = [

                "id" => $row["id"],
                "username" =>  $row["username"],
                "password" => $row["password"],
                "email" => $row["email"],
                "afbeelding" => $row["afbeelding"]

            ];

            }

        return($user);

    }

}

?>