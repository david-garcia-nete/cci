<?php

function replaceSpaces($str, $trueLength) {

    $str = str_split($str);
    $numberOfSpaces = countOfChar($str, 0, $trueLength, ' ');
    $newIndex = $trueLength - 1 + $numberOfSpaces * 2;
}

function countOfChar($str, $start, $end, $target) {
    $count = 0;
    for ($i = $start; $i < $end; $i++) {
        if ($str[$i] == $target) {
            $count++;
        }
    }

    return $count;
}

replaceSpaces("Mr John Smith    ", 13);
