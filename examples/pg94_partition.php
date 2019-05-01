<?php

include __DIR__ . '/../vendor/autoload.php';

use Cci\Util\Node;


class LinkedListPartitioner {
    
    public static function partition(Node $node, $x) {
        $beforeStart = null;
        $beforeEnd = null;
        $afterStart = null;
        $afterEnd = null;

        /* Partition list */
        while ($node != null) {
                $next = $node->getNext();
                $node->setNext(null);
                if ($node->getData() < $x) {
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
    
    public static function partition2(Node $node, $x) {
        $beforeStart = null;
        $beforeEnd = null;
        $afterStart = null;
        $afterEnd = null;

        /* Partition list */
        while ($node != null) {
                $next = $node->getNext();
                $node->setNext(null);
                if ($node->getData() < $x) {
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