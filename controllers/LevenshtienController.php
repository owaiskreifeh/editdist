<?php
require_once( __DIR__ . "/../classes/Levenshtein.php");

function levenshtein_dist(string $str1, string $str2): int{
    $levenshtein = new Levenshtein($str1, $str2);
    return $levenshtein->getCount();
}


