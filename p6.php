<?php
$stack = [-1];
$max = 0;
$str = str_split(trim(readline()));
foreach ($str as $k => $v){
    if ($v === '('){
        $stack[] = $k;
    }else{
        if (count($stack) === 1){
            array_pop($stack);
            $stack[] = $k;
        }else{
            array_pop($stack);
            $max = max($max,$k - end($stack));
//            array_pop($stack);
//            $stack[] = $k;
        }
    }
}

echo $max;