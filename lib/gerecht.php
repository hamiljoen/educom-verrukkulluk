<?php

class gerecht {

    private $connection;
    private $usr;

    public function __construct($connection) {
        $this->connection = $connection;
        $this->usr = new user ($connection);
    }

    private function selectUser($user_id) {
            
        $user = $this->usr->selecteerUser($user_id);
        return($user);

    }
    
    //selectie user

    public function selecteerGerecht($user_id) {
        
        $sql = "SELECT * FROM user WHERE id = $user_id";
        $return =[];
      
        $result = mysqli_query($this->connection, $sql);

            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

            $user_id = $row ["user_id"];
            $user = $this->selectUser($user_id);
            $return[] = [

                "id" => $row["id"],
                "user_name" => $user_name,
                "password" => $row["password"],
                "email" => $row["email"],
                "afbeelding" => $row["afbeedling"]

            ];

            }

        return($user);

    }

}

?>