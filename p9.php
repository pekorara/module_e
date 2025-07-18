<?php
//echo str_replace([',''.'],'',trim(readline()));
$str = array_filter(explode(' ',str_replace([',','.'],'',strtolower(trim(readline())))));
$list = [];
foreach($str as $s){
    if(!isset($list[$s])) $list[$s] = 0;
    $list[$s] ++;
}

ksort($list);
arsort($list);
$list = array_slice($list,0,3);
foreach($list as $k => $data){
    echo $k . PHP_EOL;
}