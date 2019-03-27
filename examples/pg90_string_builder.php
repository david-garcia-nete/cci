<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class StringBuilder {

    /**
     * @var array
     */
    private $string;

    /**
     * SimpleStringBuilder constructor
     *
     * Takes an initial string as argument
     *
     * @param null $string
     * @throws \InvalidArgumentException
     */
    public function __construct($string = null) {
        if ($string !== null) {
            ArgumentValidator::validateScalar($string);
            $this->string[] = $string;
        }
    }

    /**
     * Appends the given string
     *
     * @param string $string
     * @return $this
     * @throws \InvalidArgumentException
     */
    public function append($string) {
        ArgumentValidator::validateScalar($string);
        $this->string[] = $string;
        return $this;
    }

    /**
     * Returns the whole resulting string
     *
     * @return string
     */
    public function build() {
        return implode('', $this->string);
    }

    /**
     * Returns the whole resulting string
     *
     * @return string
     */
    public function __toString() {
        return $this->build();
    }

}

class ArgumentValidator {

    /**
     * @param mixed $value
     * @throws \InvalidArgumentException
     */
    public static function validateScalar($value) {
        if (!is_scalar($value)) {
            $type = is_object($value) ? get_class($value) : gettype($value);
            throw new customException('Expected a scalar value; got ' . $type);
        }
    }

}

class customException extends Exception {
  public function errorMessage() {
    //error message
    $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
    .': '.$this->getMessage() . "\n" . $this->getTraceAsString();
    return $errorMsg;
  }
}

$builder = new StringBuilder('first');

try {
    $builder
            ->append('a')
            ->append('12')
            ->append([]);
} catch (customException $e) {

    echo 'Message: ' . $e->errorMessage();
}

echo "\n" . $builder->build();
