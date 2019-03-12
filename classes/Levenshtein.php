<?php
require_once( __DIR__."/Method.php");

/**
 * @class Levenshtein:Method
 * Levenshtein algorithm for edit distance
 */
class Levenshtein
extends Method
{
    /**
     * @method Levenshtein Constructor
     * @param a:string Holding first string
     * @param b:string Holding second string
     */
    function Levenshtein(string $a, string $b){
        parent::Method($a, $b);
        $this->count = $this->calculate($this->m, $this->n);
        
    }

    /**
     * @method private:calculate
     * @param m:int first string length -1 
     * @param n:int second string length -1
     * @return int
     * Calcualte the levenshtein distance between 2 strings
     */
    private function calculate(int $m, int $n): int{
        $a = $this->a;
        $b = $this->b;
        /**
         * if one string is empty the edit distance will be the other length
         */
        if ($m <= 0) return $n;
        if ($n <= 0) return $m;
    
        /**
         * if the chars are same don't count an operation
         */
        if ($a[$m] === $b[$n]) return $this->calculate($m-1, $n-1);
        /**
         * find the minimum operations need
         */
        return min(
            1+ $this->calculate($m -1, $n), //delete opration
            1+ $this->calculate($m, $n -1), // insert
            1+ $this->calculate($m -1, $n -1) // replace
        );
    }


    /**
     * @override
     * @method public:static:run 
     * @return int
     * Initialize an instance of Levenshtein class and calculate the distance
     */
    public static function run(string $str1, string $str2): int{
        /**
         * Create object instance
         */
        $levenshein = new Levenshtein($str1, $str2);
        return $levenshein->getCount();
    }
}