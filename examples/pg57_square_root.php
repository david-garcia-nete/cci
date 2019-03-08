<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To cfdghange this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function sqrt_helper($n, $min, $max){
    
    if ($max < $min ) return -1;
    $guess = intval(($min + $max) / 2);
    if ($guess * $guess == $n ){
        return $guess;
    } else if ($guess * $guess < $n){
        return sqrt_helper($n, $guess + 1, $max);
    } else{
        return sqrt_helper($n, $min, $guess - 1);
    }
    
    
}


echo sqrt_helper(100, 1, 100);
