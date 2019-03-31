<?php

class ArrayList{
    
    const INITIAL_CAPACITY = 10;    
    private $theData = [];
    private $size = 0;
    private $capacity = 0;

    public function __construct() {

        $this->capacity = INITIAL_CAPACITY; 

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

    public function get ($index){
        if($index < 0 || $index > $this->size){
            throw new OutOfBoundsException($index); //Can I pass an int?  Test this. 
        } 
        return $this->theData[$index];
    }

    public function set ($index, $newValue){
        if($index < 0 || $index > $this->size){
            throw new OutOfBoundsException($index); //Can I pass an int?  Test this. 
        } 
        $oldValue = $this->theData[$index];
        $this->theData[$index] = $newValue;
        return $oldValue;
    }

    public function remove ($index){
        if($index < 0 || $index > $this->size){
            throw new OutOfBoundsException($index); //Can I pass an int?  Test this. 


        }
        $returnValue = $this->theData[$index];
        for($i = $index + 1; $i<$this->size;$i++ ){
            $this->theData[$i-1] = $this->theData[$i];
        }
        $this->size--;
        return $returnValue;  
    }

    private function reallocate(){
        $this->capacity = 2 * $this->capacity;
        $newData = [];
        for ($i = 0; $i < $this->size + 1; $i++) 
            $newData[$i] = $this->theData[$i];
        for ($i = $this->size + 1; $i < $this->capacity; $i++) 
            $newData[$i] = null;
        $this->theData = $newData;

    }
    
}

// unit test
$arrayList = new ArrayList(); 
$arrayList->add("this"); 
$arrayList->add("coder"); 
$arrayList->addAtIndex(1, "that"); 
$arrayList->add("hi"); 
$arrayList->remove(2); 
$arrayList->set(1, "yay"); 
$arrayList->get(1);
$arrayList->add("1"); 
$arrayList->add("2"); 
$arrayList->add("3"); 
$arrayList->add("4"); 
$arrayList->add("5"); 
$arrayList->add("6"); 
$arrayList->add("7"); 
$arrayList->add("8"); 
$arrayList->add("9"); 
$arrayList->add("10"); 


