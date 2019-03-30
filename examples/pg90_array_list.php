<?php


class ArrayList {

private $list;
private $numBuckets;
private $size;



// Constructor initializes capacity
public function __construct() {

$this->list = []; 
$this->numBuckets = 10;  
$this->size = 0; 


// Create empty chains 
for ($i = 0; $i < $this->numBuckets; $i++) 
    $this->$list[$i] = null;

}


public function Add($obj)
{
    // If load factor goes beyond threshold, then 
    // double hash table size 
    if ((1.0*$this->size)/$this->numBuckets >= 0.7) 
    { 
        $temp = $this->list; 
        $this->list = []; 
        $this->numBuckets = 2 * $this->numBuckets; 
        $this->size = 0; 
        for ($i = 0; $i < $this->numBuckets; $i++) 
            $this->list[$i] = null; 
    }
    array_push($this->list, $obj);
    $this->size++; 
}

public function Remove($key)
{
    if(array_key_exists($key, $this->list))
    {
        unset($this->list[$key]);
        $this->size--; 
    }
}

public function size() { return $this->size; } 
    
public function numBuckets() { return $this->numBuckets; } 

public function isEmpty() { return $this->size() == 0; }

public function GetObj($key)
{
    if(array_key_exists($key, $this->list))
    {
        return $this->list[$key];
    }
    else
    {
        return NULL;
    }
}



}