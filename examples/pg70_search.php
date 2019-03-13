<?php

define("MAX", 256);

function compare($arr1, $arr2) 
{ 
    for ($i=0; $i<MAX; $i++) {
        if ($arr1[$i] != $arr2[$i]){ 
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
    $countP = [0]*MAX;
    $countTW = [0]*MAX; 
    for ($i = 0; $i < $M; $i++) 
    { 
        $patiOrd = ord($pat[$i]);
        $txtiOrd = ord($txt[$i]);
        
        if(isset($countP[$patiOrd]))
        {
            $countP[$patiOrd]++;
        } else{
            $countP[$patiOrd] = 0;
        }
        if(isset($countTW[$txtiOrd]))
        {
            $countTW[$txtiOrd]++;
        } else{
            $countP[$patiOrd] = 0;
        } 
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
        $txtiOrd = ord($txt[$i]);
        if(isset($countTW[$txtiOrd]))
        {
            $countTW[$txtiOrd]++;
        } else{
            $countTW[$txtiOrd] = 0;
        }
  
        $txtiMDifOrd = ord($txt[$i-$M]);
        // Remove the first character of previous window 
        $countTW[$txtiMDifOrd]--; 
    } 
  
    // Check for the last window in text 
    if (compare($countP, $countTW)) {
        echo "Found at Index " . $N - $M . "\n";
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