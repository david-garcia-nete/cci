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
        $bucketIndex = getBucketIndex($key); 
  
        // Get head of chain 
        HashNode<K, V> head = bucketArray.get(bucketIndex); 
  
        // Search for key in its chain 
        HashNode<K, V> prev = null; 
        while (head != null) 
        { 
            // If Key found 
            if (head.key.equals(key)) 
                break; 
  
            // Else keep moving in chain 
            prev = head; 
            head = head.next; 
        } 
  
        // If key was not there 
        if (head == null) 
            return null; 
  
        // Reduce size 
        size--; 
  
        // Remove key 
        if (prev != null) 
            prev.next = head.next; 
        else
            bucketArray.set(bucketIndex, head.next); 
  
        return head.value; 
    } 
    
    
    
    public function set($key, $val) {
            $i = $orig_i = $this->_get_index($key);
            $node = new HashTableNode($key, $val);
            while (true) {
                    if (!isset($this->_array[$i]) || $key == $this->_array[$i]->key) {
                            $this->_array[$i] = $node;
                            break;
                    }
                    // increment $i
                    $i = (++$i % $this->_size);
                    // loop complete
                    if ($i == $orig_i) {
                            // out of space
                            $this->_double_table_size();
                            return $this->set($key, $val);
                    }
            }
            return $this;
    }
    public function get($key) {
            $i = $orig_i = $this->_get_index($key);
            while (true) {
                    if (!isset($this->_array[$i])) {
                            return null;
                    }
                    $node = $this->_array[$i];
                    if ($key == $node->key) {
                            return $node->val;
                    }
                    // increment $i
                    $i = (++$i % $this->_size);
                    // loop complete
                    if ($i == $orig_i) {
                            return null;
                    }
            }
    }
    private function _get_index($key) {
            return crc32($key) % $this->_size;
    }
    private function _double_table_size() {
            $old_size = $this->_size;
            $this->_size *= 2;
            $data = array(); // new array
            $collisions = array(); // to be re-added later
            for ($i=0; $i < $old_size; $i++) {
                    if (!empty($this->_array[$i])) {
                            $node = $this->_array[$i];
                            $j = $this->_get_index($node->key);
                            // check collisions and record them
                            if (isset($data[$j]) && $data[$j]->key != $node->key) {
                                    $collisions[] = $node;
                            } else {
                                    $data[$j] = $node;
                            }
                    }
            }
            $this->_array = $data;
            // manage collisions
            foreach ($collisions as $node) {
                    $this->set($node->key, $node->val);
            }
    }
}

// unit test
$h = new HashTable();
$h->set('abc', 'def');
$h->set('ghi', 'test');
$h->set('def', 'qbc');
echo $h->get('abc') . "\n";
echo $h->get('def') . "\n";
echo $h->get('ghi') . "\n";