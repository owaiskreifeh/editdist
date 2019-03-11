<?php 
function hamming(string $a, string $b){

    $aLen = strlen($a);
    $bLen = strlen($b);
    if ($aLen === 0) return $bLen;
    if ($bLen === 0) return $aLen;

    $count = abs($aLen - $bLen);

    for ($i = 0; $i < min([$aLen, $bLen]); $i++)
        if (strtolower($a[$i]) !== strtolower($b[$i]))
            {
                $count++;
                $a[$i] = $b[$i];
            }
    return $count;
}


function levenshtein_dist(string $a, string $b, int $m, int $n): int{
    if ($m === 0) return $n;
    if ($n === 0) return $m;

    if ($a[$m] === $b[$n]) return levenshtein_dist($a, $b, $m-1, $n-1);
    return min(
        1+ levenshtein_dist($a, $b, $m -1, $n), //delete
        1+ levenshtein_dist($a, $b, $m, $n -1), // insert
        1+ levenshtein_dist($a, $b, $m -1, $n -1) // replace
    );
}

// $str1 = "this is a test";
// $str2 = "this is test";
$str1 = "this is test";
$str2 = "the is test";
$len1 = strlen($str1) - 1;
$len2 = strlen($str2) - 1;
echo hamming($str1, $str2) . "\n";

echo levenshtein_dist($str1, $str2, $len1, $len2);
echo "\n";
echo levenshtein($str1, $str2, 1, 1, 1);

assert(levenshtein($str1, $str2, 1, 1, 1) === levenshtein_dist($str1, $str2, $len1, $len2), "Should be equal");