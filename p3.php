<?php
//function recursive($n)
//{
//    static $m = [];
//    if ($n <= 2) return $n;
//    if(isset($m[$n])) return $m[$n];
//    $m[$n] = bcadd(recursive($n-1),recursive($n-2));
//    return $m[$n];
//}

function bigAdd($a, $b) {
    $a = strrev($a);
    $b = strrev($b);
    $len = max(strlen($a), strlen($b));
    $carry = 0;
    $result = '';

    for ($i = 0; $i < $len; $i++) {
        $digitA = isset($a[$i]) ? (int)$a[$i] : 0;
        $digitB = isset($b[$i]) ? (int)$b[$i] : 0;
        $sum = $digitA + $digitB + $carry;
        $result .= $sum % 10;
        $carry = intdiv($sum, 10);
    }

    if ($carry > 0) {
        $result .= $carry;
    }

    return strrev($result);
}

function recursive($n) {
    static $m = [];
    if ($n <= 2) return (string)$n;
    if (isset($m[$n])) return $m[$n];
    $m[$n] = bigAdd(recursive($n - 1), recursive($n - 2));
    return $m[$n];
}

$n = (int)readline();
if ($n <= 1){
    echo $n;
    exit;
}
echo recursive($n - 1);