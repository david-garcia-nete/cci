<?php

// PHP program to demonstrate implementation of our 
// own hash table with chaining for collision detection 

// A node of chains 
class HashNode {
    
    public $value;
    public $key;
    
    // Reference to next node 
    public $next;

    // Constructor 
    public function __construct($key, $value) {
            $this->key = $key;
            $this->value = $value;
    }
}
// Class to represent entire hash table 
class Map {
    
    // bucketArray is used to store array of chains     
    private $bucketArray;
    
    // Current capacity of array list
    private $numBuckets;
    
    // Current size of array list 
    private $size;

    // Constructor (Initializes capacity, size and 
    // empty chains. 
    public function __construct() {
    
    $this->bucketArray = []; 
    $this->numBuckets = 10; 
    $this->size = 0;     
        
    // Create empty chains 
    for ($i = 0; $i < $this->numBuckets; $i++) 
        $this->bucketArray[$i] = null;
    
    }
    
    public function size() { return $this->size; } 
    
    public function numBuckets() { return $this->numBuckets; } 
    
    public function isEmpty() { return $this->size() == 0; }
    
    // This implements hash function to find index 
    // for a key 
    private function getBucketIndex($key) 
    { 
        $hashCode = crc32($key);
        $index = $hashCode % $this->numBuckets; 
        return $index; 
    } 
    
    // Method to remove a given key 
    public function remove($key) 
    { 
        // Apply hash function to find index for given key 
        $bucketIndex = $this->getBucketIndex($key); 
  
        // Get head of chain 
        $head = $this->bucketArray[$bucketIndex]; 
  
        // Search for key in its chain 
        $prev = null; 
        while ($head != null) 
        { 
            // If Key found 
            if ($head->key == $key) 
                break; 
  
            // Else keep moving in chain 
            $prev = $head; 
            $head = $head->next; 
        } 
  
        // If key was not there 
        if ($head == null) 
            return null; 
  
        // Reduce size 
        $this->size--; 
  
        // Remove key 
        if ($prev != null) 
            $prev->next = $head->next; 
        else
            $this->bucketArray[$bucketIndex] = $head->next; 
  
        return $head->value; 
    } 
    
    // Returns value for a key 
    public function get($key) 
    { 
        // Find head of chain for given key 
        $bucketIndex = $this->getBucketIndex($key); 
        $head = $bucketArray->get($bucketIndex); 
  
        // Search key in chain 
        while ($head != null) 
        { 
            if ($head->key  == $key) 
                return $head->value; 
            $head = $head->next; 
        } 
  
        // If key not found 
        return null; 
    } 
    
    // Adds a key value pair to hash 
    public function add($key, $value) 
    { 
        // Find head of chain for given key 
        $bucketIndex = $this->getBucketIndex($key); 
        $head = $this->bucketArray[$bucketIndex]; 
  
        // Check if key is already present 
        while ($head != null) 
        { 
            if ($head->key == $key) 
            { 
                $head->value = $value; 
                return; 
            } 
            $head = $head->next; 
        } 
  
        // Insert key in chain 
        $this->size++; 
        $head = $this->bucketArray[$bucketIndex]; 
        $newNode = new HashNode($key, $value); 
        $newNode->next = $head; 
        $this->bucketArray[$bucketIndex] = $newNode; 
  
        // If load factor goes beyond threshold, then 
        // double hash table size 
        if ((1.0*$this->size)/$this->numBuckets >= 0.7) 
        { 
            $temp = $this->bucketArray; 
            $this->bucketArray = []; 
            $this->numBuckets = 2 * $this->numBuckets; 
            $this->size = 0; 
            for ($i = 0; $i < $this->numBuckets; $i++) 
                $this->bucketArray[$i] = null; 
  
            foreach ($temp as $headNode) 
            { 
                while ($headNode != null) 
                { 
                    $this->add($headNode->key, $headNode->value); 
                    $headNode = $headNode->next; 
                } 
            } 
        } 
    } 
    
}

// unit test
$map = new Map(); 
$map->add("this",1 ); 
$map->add("coder",2 ); 
$map->add("this",4 ); 
$map->add("hi",5 ); 
echo "Size " . $map->size() . "\n"; 
echo "Remove " . $map->remove("this") . "\n"; 
echo "Remove " . $map->remove("this") . "\n"; 
echo "Size " . $map->size() . "\n"; 
echo "Empty "; echo $map->isEmpty() === true ? 'true' : 'false'; echo "\n"; 
$map->add("that",5 ); 
$map->add("musician",6 ); 
$map->add("over",7 ); 
$map->add("bye",8 );
$map->add("me",3 ); 
$map->add("you",4 ); 
$map->add("why",10 ); 
$map->add("nice",11 );
echo "Size " . $map->size() . "\n"; 
echo "Remove " . $map->remove("that") . "\n"; 
echo "Remove " . $map->remove("that") . "\n"; 
echo "Size " . $map->size() . "\n"; 
echo "Buckets " . $map->numBuckets() . "\n";
echo "Empty "; echo $map->isEmpty() === true ? 'true' : 'false'; echo "\n"; 