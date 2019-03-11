<?php
require_once( __DIR__."/Method.php");

class Levenshtein
extends Method
{


    function Levenshtein(string $a, string $b){
        parent::Method($a, $b);
        $this->count = $this->calculate($this->m, $this->n);
        
    }

    public function getCount(){ return $this->count; }

    private function calculate(int $m, int $n): int{
        $a = $this->a;
        $b = $this->b;
        
        if ($m === 0) return $n;
        if ($n === 0) return $m;
    
        if ($a[$m] === $b[$n]) return $this->calculate($m-1, $n-1);
        return min(
            1+ $this->calculate($m -1, $n), //delete
            1+ $this->calculate($m, $n -1), // insert
            1+ $this->calculate($m -1, $n -1) // replace
        );
    }
}
