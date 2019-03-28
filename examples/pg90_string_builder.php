<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include __DIR__ . '/../vendor/autoload.php';

use Cci\Util\ArgumentValidator;
use Cci\Util\CustomException;

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





$builder = new StringBuilder('first');

try {
    $builder
            ->append('a')
            ->append('12')
            ->append([]);
} catch (CustomException $e) {

    echo 'Message: ' . $e->errorMessage();
}

echo "\n" . $builder->build();
