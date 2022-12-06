<?php

$file = fopen('input.txt', 'r');

$elves = [];
$index = 0;

while ($item = fgets($file)) {
    if (strlen(trim($item)) === 0) {
        $index++;
    } else {
        $elves[$index] += (int)$item;
    }
}

rsort($elves);
var_dump($elves[0] + $elves[1] + $elves[2]);