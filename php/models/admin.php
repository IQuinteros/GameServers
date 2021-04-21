<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

/**
 * User Model
*/

require_once('model.php');

class Admin extends Model{

    /**
     * @var string
     */
    public $email;
    /**
     * @var mixed
     */
    public $lastConnectionDate;

    // Constructor
    public function __construct($id, string $email, $lastConnectionDate)
    {
        parent::__construct($id);

        $this->email = $email;
        $this->lastConnectionDate = $lastConnectionDate;
    }

}