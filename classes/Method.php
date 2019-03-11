<?php

class Method{
    protected $a, $b, $m, $n, $count;
    public function Method(string $a, string $b){
        $this->a = $a;
        $this->b = $b;
        $this->m = strlen($a) -1;
        $this->n = strlen($b) -1;

    }
}