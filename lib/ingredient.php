<?php

class ingredient {

    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }
  
    public function selecteerIngredient($ingredient_id) {
        
        $sql = "select * from gerecht where id = $gerecht_id";
        echo $sql; 
        $result = mysqli_query($this->connection, $sql);

        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);

        return($ingredient);

    }

}

?>