<?php
function d($n,$max,$str)
{
    if ($n === 0) echo trim($str) . PHP_EOL;
    for ($i = min($n,$max); $i > 0; $i--) {
        d($n-$i,$i,$str . ' ' . $i);
    }
}

$n = (int)readline();
d($n,$n,'');