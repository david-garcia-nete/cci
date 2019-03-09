<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To cfdghange this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function printSortedStrings($remaining, $prefix){
    
    if ($remaining == 0) {
        if(isInOrder($prefix)){
            echo $prefix . "\n";    
        }else{
             echo 'Out ' . $prefix . "\n";    
        }
    } else{
        $char = ord('a');
        $ordz = ord('z');
        while($char <= $ordz){
            printSortedStrings($remaining - 1, $prefix . chr($char));
            $char++;
        }
    }
    
    
}

function isInOrder($string){
    
    $isInOrder = true;
    for($i = 1; $i < strlen($string); $i++){
        $prev = $string[$i - 1];
        $curr = $string[$i - 1];
        if($prev > $curr){
            $isInOrder = $false;    
        }
    }
    return $isInOrder;
    
}


echo printSortedStrings(4, "");
