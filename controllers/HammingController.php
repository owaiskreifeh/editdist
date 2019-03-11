<?php
require_once( "./classes/Hamming.php");

function hamming_dist(string $str1, string $str2): int{
    $hamming = new Hamming($str1, $str2);
    return $hamming->getCount();
}