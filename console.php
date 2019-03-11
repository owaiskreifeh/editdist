<?php
if(!defined("STDIN")) define("STDIN", fopen("php://stdin", "rb"));
echo "Edit Distance Calculator (Levenshtein Method)" . PHP_EOL;
echo str_repeat("*", 32) . PHP_EOL;
echo "Please provide the two strings separated by comma [,]" . PHP_EOL;
$line = fread(STDIN, 256);
echo $line;

