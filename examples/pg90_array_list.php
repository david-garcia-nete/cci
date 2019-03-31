<?php

class ArrayList{
      
    private $theData = [];
    private $size = 0;
    private $capacity = 10;

    public function __construct() {

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
            throw new OutOfBoundsException($index); 
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
            throw new OutOfBoundsException($index); 
        } 
        return $this->theData[$index];
    }

    public function set ($index, $newValue){
        if($index < 0 || $index > $this->size){
            throw new OutOfBoundsException($index);  
        } 
        $oldValue = $this->theData[$index];
        $this->theData[$index] = $newValue;
        return $oldValue;
    }

    public function remove ($index){
        if($index < 0 || $index > $this->size){
            throw new OutOfBoundsException($index); 


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
        for ($i = 0; $i < $this->size; $i++) 
            $newData[$i] = $this->theData[$i];
        for ($i = $this->size + 1; $i < $this->capacity; $i++) 
            $newData[$i] = null;
        $this->theData = $newData;

    }
    
}

$arrayList = new ArrayList(); 
$arrayList->add("this"); 
$arrayList->add("coder"); 
$arrayList->addAtIndex(1, "that"); 
$arrayList->add("hi"); 
$arrayList->remove(2); 
$arrayList->set(1, "yay"); 
echo $arrayList->get(1);
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
 


