<?php

class ArrayList{
    
const INITIAL_CAPACITY = 10;    
private $theData = [];
private $size = 0;
private $capacity = 0;
 
public function __construct() {
    
    $this->capacity = INITIAL_CAPACITY; 
        
    // Create empty chains 
    for ($i = 0; $i < $this->capacity; $i++) 
        $this->theData[$i] = null;
    
}

public function add($anEntry){
    if($this->size == $this->capacity){
        $this->reallocate();
    }
    $this->theData[$this->size] = $anEntry;
    $this->size++;
    return true;
}

public function addAtIndex($index, $anEntry){
    
    if($index < 0 || $index > $this->size){
        throw new OutOfBoundsException($index); //Can I pass an int?  Test this. 
    } 
    if($this->size == $this->capacity){
        $this->reallocate();
    }
    for($i = $this->size; $i > $index; $i--){
        $this->theData[$i] = $this->theData[$i-1];
    }
    $this->theData[$index] = $anEntry;
    $this->size++; 
}

    
}