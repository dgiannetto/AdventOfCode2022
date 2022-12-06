<?php

$file = fopen('input.txt', 'r');
$score = 0;

while ($input = fgetcsv($file, null, " ")) {
    $score += (getSelfScore($input[0], $input[1]) + getResultScore($input[1]));
}

echo $score;

function getSelfScore(string $a, string $b) {
    switch ($a) {
        case 'A':
            return $b === 'X' ? 3 : ($b === 'Y' ? 1 : 2);
        case 'B':
            return $b === 'X' ? 1 : ($b === 'Y' ? 2 : 3);
        case 'C':
            return $b === 'X' ? 2 : ($b === 'Y' ? 3 : 1);
        default:
            return 0;
    }
}

function getResultScore(string $result) {
    return $result === 'X' ? 0 : ($result === 'Y' ? 3 : 6);
}