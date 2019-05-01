<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Cci\Util;

class Node {
    private $data;
    private $next;
    public function __construct($data = null) {
        $this->data = $data;
        $this->next = null;
    }
    public function getData() {
        return $this->data;
    }
    public function setData($data) {
        $this->data = $data;
    }
    public function getNext() {
        return $this->next;
    }
    public function setNext($node) {
        $this->next = $node;
    }
}