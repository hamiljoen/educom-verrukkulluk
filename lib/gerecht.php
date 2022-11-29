<?php

class gerecht {

    private $connection;
    private $usr;

    public function __construct($connection) {
        $this->connection = $connection;
        $this->usr = new user ($connection);
        $this->ing = new ingredient ($connection);
        $this->inf = new info ($connection);
        $this->keu = new keukentype ($connection);
   
    }

    private function selectIngredienten($gerecht_id) {

        $ingredienten = $this->ing->selecteerIngredient($gerecht_id);

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

    //       selecteer gerecht

    public function selecteerGerecht($gerecht_id=null) {
        
        $sql = "SELECT * FROM gerecht WHERE id = $gerecht_id";

        if (is_null($gerecht_id)) {
        
            $sql = "WHERE id = $gerecht_id";
        }

        $result = mysqli_query($this->connection, $sql);

        $gerechten =[];

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

            $ingredienten = $this->selectIngredienten($row["id"]);
            $keukentype = $this->selectKeukentype($row["id"]);
            $prijs = $this->calcPrice($ingredienten);
            $calorieen = $this->calcCalories($ingredienten);
            
            $gerechten = [

                "id" => $row["id"],
                "user_id" =>  $row["user_id"],
                "datum_toegevoegd" => $row["datum_toegevoegd"],
                "titel" => $row["titel"],
                "korte_omschrijving" => $row["korte_omschrijving"],
                "lange_omschrijving" => $row["lange_omschrijving"],
                "afbeelding" => $row["afbeelding"],
                "verpakking" => $ingredienten,
                "calorien" => $calorieen,
                "prijs" => $prijs

            ];

    }

        return($gerechten);

    }

        //      selecteer calcPrice

        public function calcPrice($ingredienten) {
            
            $prijs=0;

            foreach ($ingredienten as $ingredient)  {
            $prijs += ($ingredient["prijs"]*$ingredient["aantal"])/$ingredient["verpakking"];

            }
       
            return($prijs);
            
            }

    //      selecteer calcCalories

        public function calcCalories($ingredienten) {    

            $calorien=0;  
            
            foreach ($ingredienten as $ingredient)  {
            $calorien +=($ingredient["calorien"]*$ingredient["aantal"])/$ingredient["verpakking"];
            }

            return($calorien);
        
            }

}

?>