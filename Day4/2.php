<?php

$file = fopen('input.txt', 'r');
$count = 0;

while ($input = fgetcsv($file)) {
    $input[0] = explode('-', $input[0]);
    $input[1] = explode('-', $input[1]);

    if ($input[0][0] === $input[1][0] || $input[0][1] === $input[1][1]) {
        $count++;
    } elseif (!(($input[0][0] < $input[1][0] && $input[0][1] < $input[1][0]) || (($input[0][0] > $input[1][1] && $input[0][1] > $input[1][1])))) {
        $count++;
    }
}

echo $count;
