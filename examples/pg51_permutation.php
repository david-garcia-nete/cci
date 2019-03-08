<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function permutation ($str, $prefix){
    
    if (strlen($str) ==0){
        echo $prefix . "\n";
    }else {
        
        for($i=0; $i<strlen($str);$i++){
            $rem = substr($str, 0, $i) . substr($str, $i + 1); 
            permutation($rem, $prefix . $str[$i]);
        }
        
    }
    
    
    
    
}

permutation('str', '');
