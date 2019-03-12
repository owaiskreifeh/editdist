<?php
/**
 * Define the STDIN if not
 */
if(!defined("STDIN")) define("STDIN", fopen("php://stdin", "rb"));

require_once("./classes/Levenshtein.php");

/**
 * PHP_EOL stands for End of line
 * \n for unix-like, \r\n for windows
 */
echo "Edit Distance Calculator (Levenshtein Method)" . PHP_EOL;
/**
 * str_repeat(string $string, int howmany)
 */
echo str_repeat("*", 32) . PHP_EOL;
echo "Please provide the first string" . PHP_EOL;
echo ">";
/**
 * Read up to 265 char form the stdin
 */
$str1 = fread(STDIN, 256);
echo "Please provide the second string" . PHP_EOL;
echo ">";
$str2 = fread(STDIN, 256);
/**
 * Use the staic method of Levenshtein class to calculate the distance
 */
echo "Levenshtein Distance is: " . Levenshtein::run($str1, $str2);
echo PHP_EOL;
