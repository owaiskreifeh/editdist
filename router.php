<?php

require_once("classes/Levenshtein.php");

class Route {
    /**
     * protected @property str1:string holdes the first string input
     */
    private $str1 = null;
    /**
     * protected @property str2:string holdes the second string input
     */
    private $str2 = null;
    /**
     * protected @property errors:array<string> holdes input errors
     */
    private $errors = [];

    /**
     * @method Route
     * Route class constructor
     */
    function Route(){
        $this->control();
    }

    /**
     * @method validate
     * @return bool
     * Validated user input
     */
    function validate(): bool{

        if (!isset($_POST['string1']))
            array_push($this->errors, "The request should have first string");
        elseif(strlen($_POST['string1']) < 1)
            array_push($this->errors, "The first string can not be empty");
        else 
            return true;

        if (!isset($_POST['string2']))
            array_push($this->errors, "The request should have second string");
        elseif(strlen($_POST['string2']) < 1)
            array_push($this->errors, "The second string can not be empty");
        else 
            return true;
        return false;
    }
    
    /**
     * @method calculate
     * @return int
     * Calculates the Levenshtein distance using Levenshtein static method run
     * 
     */
    function calculate(): int{
        return Levenshtein::run($this->str1, $this->str2);
    }
    
    /**
     * @method control
     * @return void
     * Controls the response data
     */
    function control(){
        
        if (!$this->validate()){
            $this->response([
                "status" => "error",
                "errors" => $this->errors
            ]);
            return;
        }
        $this->str1 = $_POST['string1'];
        $this->str2 = $_POST['string2'];
        $this->response([
            "status" => "ok",
            "data" => $this->calculate()
        ]);
    }
    
    /**
     * @method response
     * @return void
     * Sends the HTTP response
     */
    function response($data): void{
        if ($data["status"] === "error"){
            header("Content-Type: application/json", true, 400);
        }
        elseif ($data["status"] === "ok")
            header("Content-Type: application/json", true, 200);

        echo json_encode($data);
        return;
    }
}

new Route();