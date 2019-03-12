<?php
require_once( __DIR__."/Method.php");

/**
 * @class Hamming: Method
 * Naive approach of implementing hamming edit distance algorithm
 * 
 */
class Hamming
extends Method
{
/**
 * @method Hamming Constructor
 * @param a:string Holding first string
 * @param b:string Holding second string
 */
    function Hamming(string $a, string $b){
        parent::Method($a, $b);
        $this->count = $this->calculate();
        
    }



    /**
     * @method private:calculate
     * @return int
     * Calcualte the hamming distance between 2 strings
     */
    private function calculate(): int{
        $a = $this->a;
        $b = $this->b;
        $m = $this->m +1;
        $n = $this->n +1;
        /**
         * if one string is empty the edit distance will be the other length
         */
        if ($m <= 0) return $n;
        if ($n <= 0) return $m;
    
        /**
         * if one of strings is longer than the other
         * the minimun number of operations needed
         * is the differance between them
         */
        $count = abs($m - $n);
    
        /**
         * loop throw the first string and stop if you reached the shortest one
         */
        for ($i = 0; $i < min([$m, $n]); $i++)
            if (strtolower($a[$i]) !== strtolower($b[$i]))
                {
                    $count++;
                    $a[$i] = $b[$i];
                }
        return $count;
    }

    /**
     * @override
     * @method public:static:run 
     * @return int
     * Initialize an instance of Hamming class and calculate the distance
     */
    public static function run(string $str1, string $str2): int{
        /**
         * Create object instance
         */
        $hamming = new Hamming($str1, $str2);
        return $hamming->getCount();
    }
}
