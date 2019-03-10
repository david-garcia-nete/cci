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
for ($a = 1; $a <= $n; $a++) {
    for ($b = 1; $b <= $n; $b++) {
        $result = pow($a, 3) + pow($b, 3);
        $list = $assocArray[$result]; 
        foreach($list as $key => $value){
            echo $a . ' ' . $b . ' ' . $value[0] . ' ' . $value[1] . "\n";
        }
    }
}