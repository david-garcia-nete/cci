<?php

define("MAX", 256);

function compare($arr1, $arr2) 
{ 
    for ($i=0; $i<MAX; $i++) {
        if ($arr1[i] != $arr2[i]){ 
            return false; 
        }
        return true; 
    }
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
    for ($i = 0; $i < $M; $i++) 
    { 
        ($countP[$pat[$i]])++; 
        ($countTW[$txt[$i]])++; 
    } 
  
    // Traverse through remaining characters of pattern 
    for ($i = $M; $i < $N; $i++) 
    { 
        // Compare counts of current window of text with 
        // counts of pattern[] 
        if (compare($countP, $countTW)){ 
            echo "Found at Index " . $i - $M . "\n";
        }
  
        // Add current character to current window 
        $countTW[$txt[$i]]++; 
  
        // Remove the first character of previous window 
        $countTW[$txt[$i-$M]]--; 
    } 
  
    // Check for the last window in text 
    if (compare($countP, $countTW)) 
        echo "Found at Index " . $N - $M . "\n";
} 