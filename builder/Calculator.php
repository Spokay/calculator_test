<?php

class Calculator{
    public $type;
    public $value;
    // I must try to setup a step system with 3 steps for each calculs
    public function displayValue(){

    }
    public function isOperator(){

    }
    public function isInt(){

    }
    public function isFloat(){

    }
    public function __construct($type, $value){
        $this->value = $value;
        $this->type = $type;
    }
}