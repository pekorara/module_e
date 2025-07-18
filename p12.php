<?php
function bfs($start,$end,$arr)
{
    $arr = array_flip($arr);
    if(!isset($arr[$end])) return 0;
    $query = [[$start,1]];
    while(count($query) !== 0){
        [$word,$level] = array_shift($query);
        if ($word === $end){
            return $level;
        }

        $words = str_split($word);
        for ($i = 0; $i < count($words); $i++) {
            $oc = $words[$i];
            for ($j = ord('a'); $j <= ord('z') ; $j++) {
                $words[$i] = chr($j);
                $newWord = implode('',$words);
                if (isset($arr[$newWord])){
                    $query[] = [$newWord,$level+1];
                    unset($arr[$newWord]);
                }
            }
            $words[$i] = $oc;
        }
    }
    return 0;
}

$lines = explode(' ',trim(readline()));
$start = $lines[0];
$end = $lines[1];
$count = (int)trim(readline());
$arr = [];
for ($i = 0; $i < $count; $i++) {
    $arr[] = trim(readline());
}

echo bfs($start,$end,$arr);