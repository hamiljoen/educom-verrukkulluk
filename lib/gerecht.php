<?php

class gerecht {

    private $connection;
    private $usr;

    public function __construct($connection) {
        $this->connection = $connection;
        $this->usr = new user ($connection);
    }

    //      selecteer User

    public function selectUser($user_id) {
            
        $user = $this->usr->selecteerUser($user_id);
        return($user);

    }

    //      selecteer Waardering

        public function selectRating($user_id) {
            
            $user = $this->usr->selecteerUser($user_id);
            return($user);
    
        }

    //      selecteer Bereidingswijze

            public function selectRating($user_id) {
            
                $user = $this->usr->selecteerUser($user_id);
                return($user);
        
            }
    
    //      selecteer Opmerkingen

    public function selectRemarks($user_id) {
            
        $user = $this->usr->selecteerUser($user_id);
        return($user);

    }

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