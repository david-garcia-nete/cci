<?php 
// PHP program to find intersection of 
// two sorted arrays 
  
/* Function prints Intersection  
   of arr1[] and arr2[] m is the 
   number of elements in arr1[]  
   n is the number of elements 
   in arr2[] */
function printIntersection($arr1, $arr2, 
                                $m, $n) 
{ 
    $i = 0 ; 
    $j = 0; 
    while ($i < $m && $j < $n) 
    { 
        if ($arr1[$i] < $arr2[$j]) 
            $i++; 
        else if ($arr2[$j] < $arr1[$i]) 
            $j++; 
              
        /* if arr1[i] == arr2[j] */
        else 
        { 
            echo $arr2[$j] , " "; 
            $i++; 
            $j++; 
        } 
    } 
} 
  
// Driver Code 
$arr1 = array(1, 2, 4, 5, 6); 
$arr2 = array(2, 3, 5, 7); 
  
$m = count($arr1); 
$n = count($arr2); 
  
// Function calling 
printIntersection($arr1, $arr2, $m, $n); 
  
// This code is contributed by anuj_67. 
?> 