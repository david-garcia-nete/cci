<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function compareBinToHex ($binary, $hex){
    $n1 = convertFromBase($binary, 2);
    $n2 = convertFromBase($hex, 16);
    if($n1 < 0 || $n2 < 0){
        return false;
    }
    return $n1 == $n2;    
}

function convertFromBase($number, $base){
    if ($base < 2 || ($base > 10 && $base != 16)) return -1;
    $value = 0;
    for ($i = strlen($number) - 1; $i >= 0; $i--){
        $digit = digitToValue(substr($number, $i, 1));
        if ($digit < 0 || $digit >= $base){
            return -1;
        }
        $exp = strlen($number) - 1 - $i;
        $value += $digit * pow($base, $exp);
    }
    return $value;
}

function digitToValue($c){
    switch ($c){
        case '0':
            return 0;
        case '1':
            return 1;
        case '2':
            return 2;
        case '3':
            return 3;
        case '4':
            return 4;
        case '5':
            return 5;
        case '6':
            return 6;
        case '7':
            return 7;
        case '8':
            return 8;
        case '9':
            return 9;
        case 'A':
            return 10;
        case 'B':
            return 11;
        case 'C':
            return 12;
        case 'D':
            return 13;
        case 'E':
            return 14;
        case 'F':
            return 15;         
    }
}

echo compareBinToHex('1111', 'F');