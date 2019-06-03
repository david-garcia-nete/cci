<?php


class Insertion {
    public static function insert($n, $m, $i, $j) {
        $allOnes = ~0;
        $leftSideOfBitMask = ($allOnes << ($j + 1)); //1111111110000000
        $rightSideOfBitMask = (1 << $i) - 1;   //0000000000000011
        $bitMask = $leftSideOfBitMask | $rightSideOfBitMask; //1111111110000011
        return ($n & $bitMask) | ($m << $i);
    }
}