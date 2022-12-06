<?php

$file = fopen('input.txt', 'r');
$score = 0;

while ($input = fgetcsv($file, null, " ")) {
    $score += (getSelfScore($input[1]) + getResultScore($input[0], $input[1]));
}

echo $score;

function getSelfScore(string $selection) {
    return $selection === 'X' ? 1 : ($selection === 'Y' ? 2 : 3);
}

function getResultScore(string $a, string $b) {
    switch ($a) {
        case 'A':
            return $b === 'X' ? 3 : ($b === 'Y' ? 6 : 0);
        case 'B':
            return $b === 'X' ? 0 : ($b === 'Y' ? 3 : 6);
        case 'C':
            return $b === 'X' ? 6 : ($b === 'Y' ? 0 : 3);
        default:
            return 0;
    }
}