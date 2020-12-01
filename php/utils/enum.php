<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

class Enum{
    protected $value;

    public function __construct($value){
        $this->value = $value;
    }

    public function getValue(){
        return $this->value;
    }

    public function __toString()
    {
        return $this->value;
    }
}