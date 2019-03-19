<?php 
// PHP program to find union of 
// two sorted arrays 
  
/* Function prints union of  
  arr1[] and arr2[] m is the 
  number of elements in arr1[] 
  n is the number of elements 
  in arr2[] */
function printUnion($arr1, $arr2, 
                         $m, $n) 
{ 
    $i = 0; $j = 0; 
    while ($i < $m && $j < $n) 
    { 
        if ($arr1[$i] < $arr2[$j]) 
            echo($arr1[$i++] . " "); 
          
        else if ($arr2[$j] < $arr1[$i]) 
            echo($arr2[$j++] . " "); 
          
        else
        { 
            echo($arr2[$j++] . " "); 
            $i++; 
        } 
    } 
      
    // Print remaining elements 
    // of the larger array 
    while($i < $m) 
        echo($arr1[$i++] . " "); 
      
    while($j < $n) 
        echo($arr2[$j++] . " "); 
} 
  
// Driver Code 
$arr1 = array(1, 2, 4, 5, 6); 
$arr2 = array(2, 3, 5, 7); 
  
$m = sizeof($arr1); 
$n = sizeof($arr2); 
  
// Function calling 
printUnion($arr1, $arr2, $m, $n); 
  
// This code is contributed by Ajit. 
?> 