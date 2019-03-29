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
    public function __construct($key, $val) {
            $this->key = $key;
            $this->val = $val;
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
    
    $bucketArray = []; 
    $numBuckets = 10; 
    $size = 0;     
        
    // Create empty chains 
    for ($i = 0; $i < $numBuckets; $i++) 
        $bucketArray[$i] = null;
    
    }
    
    public function size() { return $size; } 
    
    public function isEmpty() { return size() == 0; }
    
    // This implements hash function to find index 
    // for a key 
    private function getBucketIndex($key) 
    { 
        $hashCode = crc32($key);
        $index = $hashCode % $numBuckets; 
        return $index; 
    } 
    
    // Method to remove a given key 
    public function remove($key) 
    { 
        // Apply hash function to find index for given key 
        $bucketIndex = $this->getBucketIndex($key); 
  
        // Get head of chain 
        $head = $bucketArray->get($bucketIndex); 
  
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
        $size--; 
  
        // Remove key 
        if ($prev != null) 
            $prev->next = $head->next; 
        else
            $bucketArray->set($bucketIndex, $head->next); 
  
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
        $head = $bucketArray->get($bucketIndex); 
  
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
        $size++; 
        $head = $bucketArray->get($bucketIndex); 
        $newNode = new HashNode($key, $value); 
        $newNode->next = $head; 
        $bucketArray->set($bucketIndex, $newNode); 
  
        // If load factor goes beyond threshold, then 
        // double hash table size 
        if ((1.0*$size)/$numBuckets >= 0.7) 
        { 
            $temp = $bucketArray; 
            $bucketArray = []; 
            $numBuckets = 2 * $numBuckets; 
            $size = 0; 
            for ($i = 0; $i < $numBuckets; $i++) 
                $bucketArray->add(null); 
  
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
$map.add("this",1 ); 
$map.add("coder",2 ); 
$map.add("this",4 ); 
$map.add("hi",5 ); 
echo $map->size(); 
echo $map->remove("this"); 
echo $map->remove("this"); 
echo $map->size(); 
echo $map->isEmpty(); 