<?php

class Calculator{
    public $type;
    public $value;
    public $firstHistory;
    public $secondHistory;
    public $thirdHistory;
    public $output;
    // I must try to setup a step system with 3 steps for each calculs
    public function isNumber(){
        if ($this->type == 'number'){
            return true;
        }else{
            return false;
        }
    }
    public function isOperator(){
        if ($this->type == 'operator'){
            return true;
        }else{
            return false;
        }
    }
    public function isTool(){
        if ($this->type == 'tool'){
            return true;
        }else{
            return false;
        }
    }
    public function checkType(){
        if ($this->isNumber()){
            if (!isset($this->secondHistory)){
                $this->firstHistory .= $this->value;
                return $this->firstHistory;
            }
            if (isset($this->secondHistory)){
                // to do : color the operator that is currently used
                $this->thirdHistory .= $this->value;
                return $this->thirdHistory;
            }
        }elseif($this->isOperator()){
            $this->secondHistory = $this->value;
            return $this->firstHistory;
        }elseif($this->isTool()){
            if ($this->value == 'reset'){
                $this->reset();
            }elseif ($this->value == 'delete'){
                return $this->delete();
            }elseif ($this->value == 'dot'){
                return $this->decimals();
            }elseif ($this->value == 'equal'){
                return $this->result();
            }
        }
    }
    public function reset(){
        session_destroy();
        $this->firstHistory = '';
        $this->secondHistory = '';
        $this->thirdHistory = '';
        $this->output = 0;
        $this->value = '';
        $this->type = '';
    }
    public function delete(){
        if (!isset($this->secondHistory)){
            $rest = substr($this->firstHistory, 0, -1);
            $this->firstHistory = $rest;
            return $this->firstHistory;
        }
        if (isset($this->secondHistory) && !isset($this->thirdHistory)){
            unset($this->secondHistory);
            return $this->firstHistory;
        }
        if (isset($this->secondHistory) && isset($this->thirdHistory)){
            $rest = substr($this->thirdHistory, 0, -1);
            $this->thirdHistory = $rest;
            return $this->thirdHistory;
        }
    }
    public function decimals(){
        if (!isset($this->secondHistory)){
            $this->firstHistory .= '.';
            return $this->firstHistory;
        }
        if (isset($this->secondHistory) && !isset($this->thirdHistory)){
            unset($this->secondHistory);
            var_dump('scnd condition');
            $this->firstHistory .= '.';
            return $this->firstHistory;
        }
        if (isset($this->thirdHistory)){
            // to do : color the operator that is currently used
            $this->thirdHistory .= '.';
            return $this->thirdHistory;
        }
    }
    public function result(){
        $this->convertFloatAndInteger();
        if ($this->secondHistory == 'plus'){
            return ($this->firstHistory + $this->thirdHistory);
        }elseif ($this->secondHistory == 'minus'){
            return ($this->firstHistory - $this->thirdHistory);
        }elseif ($this->secondHistory == 'multiplie'){
            return ($this->firstHistory * $this->thirdHistory);
        }elseif ($this->secondHistory == 'divide'){
            return ($this->firstHistory / $this->thirdHistory);
        }
        // switch the result to the first history when finished
    }
    public function convertFloatAndInteger(){
        if (str_contains($this->firstHistory, '.')){
            $this->firstHistory = floatval($this->firstHistory);
        }if (str_contains($this->thirdHistory, '.')){
            $this->thirdHistory = floatval($this->thirdHistory);
        }
    }
    public function __construct($type, $value, $firstHistory, $secondHistory, $thirdHistory){
        $this->value = $value;
        $this->type = $type;
        $this->firstHistory = $firstHistory;
        $this->secondHistory = $secondHistory;
        $this->thirdHistory = $thirdHistory;
        $this->output = $this->checkType();
    }
}