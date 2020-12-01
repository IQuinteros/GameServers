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

class User extends Model{

    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $email;
    /**
     * @var mixed
     */
    public $image;
    /**
     * @var int
     */
    public $membersNum;
    /**
     * @var int
     */
    public $contactNum;
    /**
     * @var string
     */
    public $location;
    /**
     * @var mixed
     */
    public $registerDate;
    /**
     * @var mixed
     */
    public $lastConnectionDate;

    // Constructor
    public function __construct($id, string $name, string $email, $image, int $membersNum, int $contactNum, string $location, $registerDate, $lastConnectionDate)
    {
        parent::__construct($id);

        $this->name = $name;
        $this->email = $email;
        $this->image = $image;
        $this->membersNum = $membersNum;
        $this->contactNum = $contactNum;
        $this->location = $location;
        $this->registerDate = $registerDate;
        $this->lastConnectionDate = $lastConnectionDate;
    }

}