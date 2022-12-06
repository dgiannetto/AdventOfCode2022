<?php

$file = fopen('input.txt', 'r');
$stacks = readInitialStacks($file);

while ($line = fgets($file)) {
    preg_match("/\D*(\d{1,2})\D*(\d)\D*(\d)/", $line, $matches);
    moveCrates($matches[1], $matches[2]-1, $matches[3]-1, $stacks);
}

foreach ($stacks as $crates) {
    echo array_pop($crates);
}

function moveCrates(int $count, int $from, int $to, array &$stacks) {
    $crates = array_splice($stacks[$from], ($count*-1));
    foreach ($crates as $crate) {
        array_push($stacks[$to], $crate);
    }
}

function readInitialStacks($file): array {
    $stacks = [];

    while ($line = fgets($file)) {
        if (empty(trim($line))) {break;}
        $input[] = $line;
    }
    $input = array_reverse($input);
    array_shift($input);

    foreach ($input as $line) {
        preg_match(
            "/[\W]([\w\s])\W{3}([\w\s])\W{3}([\w\s])\W{3}([\w\s])\W{3}([\w\s])\W{3}([\w\s])\W{3}([\w\s])\W{3}([\w\s])\W{3}([\w\s])\W/",
            $line,
            $matches
        );
        
        array_shift($matches);
        foreach ($matches as $key => $value) {
            if ($value !== " ") {
                $stacks[$key][] = $value;
            }
        }
    }

    return $stacks;
}