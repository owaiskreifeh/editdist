<?php

abstract class Method{
    /**
     * protected @property a:string first string holder
     * protected @property b:string second string holder
     * protected @property m:int last char index in first string
     * protected @property n:int last char index in second string
     * protected @property count:int number of operations done
     */
    protected $a, $b, $m, $n, $count;

    /**
     * @method Method constructor
     */
    public function Method(string $a, string $b){
        $this->a = $a;
        $this->b = $b;
        $this->m = strlen($a) -1;
        $this->n = strlen($b) -1;

    }
    /**
     * @method public:getCount
     * @return int 
     * count prop defined in the Parent class Method
     */
    public function getCount():int {
        return $this->count;
    }

    /**
     * @method abstract:static:run
     * @return int
     */
    abstract static function run(string $str1, string $str2): int;
}