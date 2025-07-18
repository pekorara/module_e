<?php
$list = [];
while($lines = trim(readline())){
    $line = explode(' ',$lines);
    $list[] =[
        'date' => DateTime::createFromFormat('Y-m-d H:i:s',trim($line[0]) . ' ' . trim($line[1])),
        'method' => trim($line[2]),
        'url' => trim($line[3]),
        'code' => trim($line[5]),
        'status' => implode(' ',array_slice($line,5))
    ];
}

uasort($list,function ($a,$b){
   return $a['date'] <=> $b['date'];
});

$methods = [];
$status = [];
$errors = [];
foreach($list as $v){
    if(!isset($methods[$v['method']])) $methods[$v['method']] = 0;
    $methods[$v['method']]++;

    if(!isset($status[$v['status']])) $status[$v['status']] = 0;
    $status[$v['status']]++;

    if($v['code'][0] !== '1' && $v['code'][0] !== '2' && $v['code'][0] !== '3'){
        $code = $v['code'];
        $str = "The path and number of visits corresponding to the $code status";
        if(!isset($errors[$str][$v['url']])) $errors[$str][$v['url']] = 0;
        $errors[$str][$v['url']]++;
    }
}

echo 'Request Method Statistics' . PHP_EOL;
arsort($methods);
foreach($methods as $k => $v){
    echo $k . ': ' . $v . PHP_EOL;
}
echo PHP_EOL;
echo 'Status Code Statistic' . PHP_EOL;
arsort($status);
foreach($status as $k => $v){
    echo $k . ': ' . $v . PHP_EOL;
}
echo PHP_EOL;
foreach($errors as $k => $v){
    uasort($v,function ($a,$b){
        return $b - $a;
    });
}
foreach($errors as $k => $v){
    echo $k . PHP_EOL;
    foreach($v as $k2 => $v2){
        echo $k2 . ': ' . $v2 . PHP_EOL;
    }
    echo PHP_EOL;
}