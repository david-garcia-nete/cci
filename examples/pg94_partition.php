<?php

include __DIR__ . '/../vendor/autoload.php';

use Cci\Util\Node;


class LinkedListPartitioner {
    public static function partition(Node $node, $x) {
        // build 2 linked lists: one for the values less than $x
        // and one for the values greater than or equal to $x
        $lowerHead = new Node(0); // placeholder node at the head
        $lowerTail = $lowerHead;
        $upperHead = new Node(0); // placeholder node at the head
        $upperTail = $upperHead;
        while ($node !== null) {
            if ($node->getData() < $x) {
                $lowerTail->setNext($node);
                $lowerTail = $node;
            } else {
                $upperTail->setNext($node);
                $upperTail = $node;
            }
            $node = $node->getNext();
        }
        // attach the upper list to the lower list
        // and discard the placeholder nodes
        $lowerTail->setNext($upperHead->getNext());
        $upperTail->setNext(null);
        return $lowerHead->getNext();
    }
    
    public static function partitionCci(Node $node, $x) {
        $beforeStart = null;
        $beforeEnd = null;
        $afterStart = null;
        $afterEnd = null;

        /* Partition list */
        while ($node != null) {
                $next = $node->getNext();
                $node->setNext(null);
                if ($node->getData() < x) {
                        if ($beforeStart == null) {
                                $beforeStart = $node;
                                $beforeEnd = $beforeStart;
                        } else {
                                $beforeEnd->setNext($node);
                                $beforeEnd = $node;
                        }
                } else {
                        if ($afterStart == null) {
                                $afterStart = $node;
                                $afterEnd = $afterStart;
                        } else {
                                $afterEnd->setNext($node);
                                $afterEnd = $node;
                        }
                }	
                $node = $next;
        }

        /* Merge before list and after list */
        if ($beforeStart == null) {
                return $afterStart;
        }

        $beforeEnd->setNext($afterStart);
        return $beforeStart;
    }
    
    public static function partitionCci2(Node $node, $x) {
        $beforeStart = null;
        $beforeEnd = null;
        $afterStart = null;
        $afterEnd = null;

        /* Partition list */
        while ($node != null) {
                $next = $node->getNext();
                $node->setNext(null);
                if ($node->getData() < x) {
                        if ($beforeStart == null) {
                                $beforeStart = $node;
                                $beforeEnd = $beforeStart;
                        } else {
                                $beforeEnd->setNext($node);
                                $beforeEnd = $node;
                        }
                } else {
                        if ($afterStart == null) {
                                $afterStart = $node;
                                $afterEnd = $afterStart;
                        } else {
                                $afterEnd->setNext($node);
                                $afterEnd = $node;
                        }
                }	
                $node = $next;
        }

        /* Merge before list and after list */
        if ($beforeStart == null) {
                return $afterStart;
        }

        $beforeEnd->setNext($afterStart);
        return $beforeStart;
    }
}