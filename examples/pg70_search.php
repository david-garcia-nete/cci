<?php

define("MAX", 256);

function compare($arr1, $arr2) 
{ 
    for ($i=0; $i<MAX; $i++) {
        if ($arr1[$i] != $arr2[$i]){ 
            return false; 
        }
    }
    return true; 
} 
  
// This function search for all permutations of pat[] in txt[] 
function search($pat, $txt) 
{ 
    $M = strlen($pat);
    $N = strlen($txt); 
  
    // countP[]:  Store count of all characters of pattern 
    // countTW[]: Store count of current window of text 
    $countP = [];
    $countTW = []; 
    for ($i = 0; $i < MAX; $i++) 
    { 
        $countP[$i] = 0;
        $countTW[$i] = 0; 
    }
    for ($i = 0; $i < $M; $i++) 
    { 
        $countP[ord($pat[$i])]++; 
        $countTW[ord($txt[$i])]++; 
    } 
  
    // Traverse through remaining characters of pattern 
    for ($i = $M; $i < $N; $i++) 
    { 
        // Compare counts of current window of text with 
        // counts of pattern[] 
        if (compare($countP, $countTW)){ 
            echo "Found at Index " . ($i - $M) . "\n";
        }
  
        // Add current character to current window 
        $countTW[ord($txt[$i])]++; 
  
        // Remove the first character of previous window 
        $countTW[ord($txt[($i-$M)])]--; 
    } 
  
    // Check for the last window in text 
    if (compare($countP, $countTW)) {
        echo "Found at Index " . ($N - $M) . "\n";
    }
} 

 
 
 
    $txt = "BACDGABCDA"; 
    $pat = "ABCD"; 
    search($pat, $txt); 
 
 
/*
Output:
Found at Index 0
Found at Index 5
Found at Index 6
*/