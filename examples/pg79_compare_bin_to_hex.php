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
        $digit = digitToValue(substr($number, $i));
        if ($digit < 0 || $digit >= $base){
            return -1;
        }
        $exp = strlen($number) - 1 - $i;
        $value += $digit * pow($base, $exp);
    }
    return $value;
}

compareBinToHex('1111', 'F');