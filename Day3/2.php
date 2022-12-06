<?php

$input = file('input.txt', );
$prioritySum = 0;

for ($i=0; $i<count($input); $i+=3) {
    $sacks = [
        array_unique(str_split(trim($input[$i])), SORT_STRING),
        array_unique(str_split(trim($input[$i+1])), SORT_STRING),
        array_unique(str_split(trim($input[$i+2])), SORT_STRING)
    ];

    $badge = array_intersect($sacks[0], $sacks[1], $sacks[2]);
    $prioritySum += getPriorityValue(array_pop($badge));
}

echo $prioritySum;

function getPriorityValue(string $str): int {
    $value = ord($str) - 96;
    if ($value < 1) {
        $value += 58;
    }
    return $value;
}