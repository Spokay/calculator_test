<?php

class Calculator{
    public $type;
    public $value;
    public $history;
    public $newValue;
    // I must try to setup a step system with 3 steps for each calculs
    public function addNumberValue(){
        if ($this->type == 'number'){
            return $this->history .= $this->value;
        }
    }
    public function reset(){
        if ($this->type == 'tool' && $this->value == 'reset'){
            session_destroy();
            $this->history = '';
            $this->newValue = '';
            $this->value = '';
            $this->type = '';
        }
    }
    public function isOperator(){

    }
    public function isInt(){

    }
    public function isFloat(){

    }
    public function __construct($type, $value, $history){
        $this->history = $history;
        $this->value = $value;
        $this->type = $type;
        $this->newValue = $this->addNumberValue();
        $this->reset();
    }
}