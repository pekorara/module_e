<?php
$num = (int)readline();
$list = [50,10,5,1];
$count = [];
foreach ($list as $data){
    $count[] = intval($num / $data);
    $num %= $data;
}

echo $list[3] . ' ' . $count[3] . PHP_EOL;
echo $list[2] . ' ' . $count[2] . PHP_EOL;
echo $list[1] . ' ' . $count[1] . PHP_EOL;
echo $list[0] . ' ' . $count[0] . PHP_EOL;
echo array_sum($count);