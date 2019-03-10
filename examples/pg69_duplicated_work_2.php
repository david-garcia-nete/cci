<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To cfdghange this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$n = 1000;
for ($c = 1; $c <= $n; $c++) {
    for ($d = 1; $d <= $n; $d++) {
        $result = pow($c, 3) + pow($d, 3);
        $assocArray[$result][] = [$c, $d]; 
    }
}
foreach ($assocArray as $value){
    foreach ($value as $pair1){
        foreach ($value as $pair2){
            echo $pair1[0] . ' ' . $pair1[1] . ' ' . $pair2[0] . ' ' . $pair2[1] . "\n";
        }
    }
}