<?php

require_once("classes/Levenshtein.php");

class Route {
    private $str1 = null;
    private $str2 = null;
    private $errors = [];

    function Route(){
        $this->control();
    }

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
    
    function calculate(): int{
        return Levenshtein::run($this->str1, $this->str2);
    }
    
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