<?php

function replaceSpaces($str, $trueLength) {

    $str = str_split($str);
    $numberOfSpaces = countOfChar($str, 0, $trueLength, ' ');
    $newIndex = $trueLength - 1 + $numberOfSpaces * 2;
    if($newIndex + 1 < count($str)) $str[$newIndex + 1] = "\0";
    for($oldIndex = $trueLength - 1; $oldIndex >= 0; $oldIndex -= 1){
        if($str[$oldIndex] == ' '){
            $str[$newIndex] = '0';
            $str[$newIndex - 1] = '2';
            $str[$newIndex - 2] = '%';
            $newIndex -= 3;  
        }else{
            $str[$newIndex] = $str[$oldIndex];
            $newIndex -= 1;
        }
    }
    $str = implode($str);
    return $str;
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

echo "\"" . replaceSpaces("Mr John Smith    ", 13) . "\"";
