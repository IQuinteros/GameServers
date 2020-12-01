<?php

/**
 * Project Model
*/

require_once('model.php');
require_once __DIR__.('/../utils/enum.php');

class ProjectStatus extends Enum {
    const Active = 'Active';
    const Inactive = 'Inactive';
    const Finished = 'Finished';

    public function __construct(string $value){
        parent::__construct($value);
    }
}

class Project extends Model{

    /**
     * @var int
     */
    public $userID;
    /**
     * @var string
     */
    public $name;
    /**
     * @var int
     */
    public $planID;
    /**
     * @var int
     */
    public $estimatedPlayers;
    /**
     * @var int
     */
    public $teamQuantity;
    /**
     * @var string
     */
    public $region;
    /**
     * @var string
     */
    public $registerDate;
    /**
     * @var ProjectStatus
     */
    public $status;

    // Constructor
    public function __construct($id, int $userID, string $name, int $planID, int $estimatedPlayers, int $teamQuantity, string $region, string $registerDate, ProjectStatus $status)
    {
        parent::__construct($id);

        $this->userID = $userID;
        $this->name = $name;
        $this->planID = $planID;
        $this->estimatedPlayers = $estimatedPlayers;
        $this->teamQuantity = $teamQuantity;
        $this->region = $region;
        $this->registerDate = $registerDate;
        $this->status = $status;
    }

}