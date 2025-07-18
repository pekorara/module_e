<?php
function tree($left,$right,$arr)
{
    if ($left >= count($arr) && $right >= count($arr)) return true;
    if ($left >= count($arr) || $right >= count($arr)) return false;
    if($arr[$left] !== $arr[$right]) return false;
    $left_left = $left * 2 + 1;
    $left_right = $left * 2 + 2;
    $right_left = $right * 2 + 1;
    $right_right = $right * 2 + 2;

    return tree($left_left,$right_right,$arr) && tree($right_left,$left_right,$arr);
}

$arr = json_decode(trim(readline()));
echo (tree(1,2,$arr) ? 'Y' : 'N');