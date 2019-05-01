<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../examples/pg94_partition.php';

use Cci\Util\Node;

class LinkedListPartitionerTest extends \PHPUnit\Framework\TestCase {
    protected $linkedList;
    protected $values;
    protected function setUp(): void {
        $this->values = [ 3, 5, 8, 5, 10, 2, 1 ];
        // build a linked list
        $head = null;
        $previousNode = null;
        foreach ($this->values as $value) {
            $node = new Node($value);
            if ($head === null) {
                $head = $node;
            } else {
                $previousNode->setNext($node);
            }
            $previousNode = $node;
        }
        $this->linkedList = $head;
    }
    protected function tearDown(): void {
        $this->linkedList = null;
        $this->values = null;
    }
    public function testPartition() {
        $x = 5;
        $node = LinkedListPartitioner::partition($this->linkedList, $x);
        $beforePartition = true;
        $nodeCount = 0;
        while ($node !== null) {
            $data = $node->getData();
            if ($beforePartition && $data >= $x) {
                $beforePartition = false;
            }
            if ($beforePartition) {
                $this->assertTrue($data < $x);
            } else {
                $this->assertTrue($data >= $x);
            }
            $node = $node->getNext();
            $nodeCount++;
        }
        $this->assertEquals(count($this->values), $nodeCount);
    }
}

$LinkedListPartitionerTest = new LinkedListPartitionerTest();

$LinkedListPartitionerTest->testPartition();



