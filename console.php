<?php
require_once("./controllers/LevenshtienController.php");

if(!defined("STDIN")) define("STDIN", fopen("php://stdin", "rb"));
echo "Edit Distance Calculator (Levenshtein Method)" . PHP_EOL;
echo str_repeat("*", 32) . PHP_EOL;
echo "Please provide the first string" . PHP_EOL;
echo ">";
$str1 = fread(STDIN, 256);
echo "Please provide the second string" . PHP_EOL;
echo ">";
$str2 = fread(STDIN, 256);
echo "Levenshtein Distance is: " . levenshtein_dist($str1, $str2);
echo PHP_EOL;
