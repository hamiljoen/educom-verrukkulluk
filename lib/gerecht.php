<?php

class gerecht {

    private $connection;
    private $usr;

    public function __construct($connection) {
        $this->connection = $connection;
        $this->usr = new user ($connection);
        $this->ing = new ingredient ($connection);
        $this->inf = new info ($connection);
   
    }

    private function selectIngredienten($gerecht_id) {

        $ingredienten = $this->ing->selecteerIngredienten($gerecht_id);
        return($ingredienten);
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

    //      selecteer Waardering

    public function selectRating($gerecht_id, $record_type) {
            
        $info = $this->inf->selectInfo($gerecht_id, 'W');
        return($info);
    
    }

    //      selecteer Bereidingswijze

    public function selectSteps($gerecht_id, $record_type) {
            
        $info = $this->inf->selectInfo($gerecht_id, 'B');
        return($info);
    
    }

    //      selecteer Opmerkingen

    public function selectRemarks($gerecht_id, $record_type) {
            
    $info = $this->inf->selectInfo($gerecht_id, 'O');
    return($info);
        
        }

    //         selectie gerecht

    public function selecteerGerecht($gerecht_id) {
        
        $sql = "SELECT * FROM gerecht WHERE id = $gerecht_id";

        $result = mysqli_query($this->connection, $sql);

        $gerechten =[];

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

            $ingredienten = $this->selecteerIngredienten($row["id"]);
            $prijs = $this->calcPrice($ingredienten);
            $calorieen = $this->calcCalories($ingredienten);
            
            $gerechten = [

                "id" => $row["id"],
                "user_id" =>  $row["user_id"],
                "datum_toegevoegd" => $row["datum_toegevoegd"],
                "titel" => $row["titel"],
                "kort_omschrijving" => $row["kort_omschrijving"],
                "lange_omschrijving" => $row["lange_omschrijving"],
                "afbeelding" => $row["afbeelding"],
                "aantal" => $this->ing->SelecteerArtikel($row["aantal"]),
                "prijs" => $this->ing->SelecteerArtikel($row["prijs"]),
                "eenheid" => $this->ing->SelecteerArtikel($row["eenheid"]),
                "verpakking" => $this->ing->SelecteerArtikel($row["verpakking"]),
                "calorien" => $this->ing->SelecteerArtikel($row["calorien"]),

            ];

    }

        return($ingredienten);

    }

    //      selecteer calcPrice

        public function calcPrice($ingredient_id) {
        
            foreach ($ingredient as ingredient) {
            $prijs += $ingredient + ["prijs"]; $ingredient  + ["aantal"];

            }
       
            return($prijs);
            
            }

    //      selecteer calcCalories

        public function calcCalories($ingredient_id) {
        
            foreach ($ingredient as ingredient) {
            $calorieen += $ingredient + ["calorien"]; $ingredient  + ["aantal"];
            
        }
   
            return($calorieen);
        
            }

}

?>