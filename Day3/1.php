<?php

$file = fopen('input.txt', 'r');
$prioritySum = 0;

while ($input = trim(fgets($file))) {
    $compartments = str_split($input, strlen($input) / 2);
    $compartments[0] = array_unique(str_split($compartments[0]), SORT_STRING);
    $compartments[1] = array_unique(str_split($compartments[1]), SORT_STRING);
    foreach (array_intersect($compartments[0], $compartments[1]) as $item) {
        $prioritySum += getPriorityValue($item);
    }
}

echo $prioritySum;

function getPriorityValue(string $str): int {
    $value = ord($str) - 96;
    if ($value < 1) {
        $value += 58;
    }
    return $value;
}