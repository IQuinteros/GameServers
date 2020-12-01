<?php

/**
 * Feature Model
*/

require_once('model.php');

class ExperimentElement extends Model{

    /**
     * @var int
     */
    public $projectID;
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $description;

    // Constructor
    public function __construct($id, int $projectID, string $name, string $description)
    {
        parent::__construct($id);

        $this->projectID = $projectID;
        $this->name = $name;
        $this->description = $description;
    }

}