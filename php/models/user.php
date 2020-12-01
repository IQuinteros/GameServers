<?php

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
     * @var string
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
     * @var string
     */
    public $registerDate;
    /**
     * @var string
     */
    public $lastConnectionDate;

    // Constructor
    public function __construct($id, string $name, string $email, string $image, int $membersNum, int $contactNum, string $location, string $registerDate, string $lastConnectionDate)
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