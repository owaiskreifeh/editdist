<?php
require_once( __DIR__."/Method.php");

class Hamming
extends Method
{

    function Hamming(string $a, string $b){
        parent::Method($a, $b);
        $this->count = $this->calculate();
        
    }

    public function getCount():int { return $this->count; }

    private function calculate(): int{
        $a = $this->a;
        $b = $this->b;
        $m = $this->m +1;
        $n = $this->n +1;
        if ($m === 0) return $n;
        if ($n === 0) return $m;
    
        $count = abs($m - $n);
    
        for ($i = 0; $i < min([$m, $n]); $i++)
            if (strtolower($a[$i]) !== strtolower($b[$i]))
                {
                    $count++;
                    $a[$i] = $b[$i];
                }
        return $count;
    }
    public static function run(string $str1, string $str2): int{
        $hamming = new Hamming($str1, $str2);
        return $hamming->getCount();
    }
}
