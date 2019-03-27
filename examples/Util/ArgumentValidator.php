<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Cci\Util;

class ArgumentValidator {

    /**
     * @param mixed $value
     * @throws \InvalidArgumentException
     */
    public static function validateScalar($value) {
        if (!is_scalar($value)) {
            $type = is_object($value) ? get_class($value) : gettype($value);
            throw new CustomException('Expected a scalar value; got ' . $type);
        }
    }

}