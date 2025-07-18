<?php
$list = [];
$count = (int)trim(readline());
for ($i = 0; $i < $count; $i++) {
    $line = (int)trim(readline());
    $flag = true;
    for ($j = 2; $j <= sqrt($line); $j++) {
        if($line % $j === 0){
            $flag = false;
            break;
        }
    }

    $list[] = $flag ? 'Y' : "N";
}
//print_r($list);
for ($k = 0; $k < count($list); $k++) {
    echo $list[$k] . PHP_EOL;
}