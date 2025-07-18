<?php
$key = readline();
$str = '';
while($line = readline()){
    $str .= $line;
}
$list = str_split($str);

$max = 1;
$depth = 1;
for ($i = 0; $i < count($list); $i++) {
    if($list[$i] === '<' && $list[$i+1] !== '/') $depth++;
    if($list[$i] === '<' && $list[$i+1] === '/') $depth-=2;
    if ($list[$i] === $key[0]){
        $flag = true;
        for ($j = 0; $j < strlen($key); $j++) {
            if($list[$i+$j] !== $key[$j]){
                $flag = false;
                break;
            }
        }
        if ($flag) $max = max($max,$depth - 1);
    }
}

echo $max;