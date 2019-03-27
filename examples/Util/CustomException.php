<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Cci\Util;

use Exception;

class CustomException extends Exception {
  public function errorMessage() {
    //error message
    $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
    .': '.$this->getMessage() . "\n" . $this->getTraceAsString();
    return $errorMsg;
  }
}