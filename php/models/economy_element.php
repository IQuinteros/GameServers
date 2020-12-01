<?php

/**
 * Feature Model
*/

require_once('model.php');

class EconomyElement extends Model{

    /**
     * @var int
     */
    public $projectID;
    /**
     * @var string
     */
    public $name;
    /**
     * @var int
     */
    public $initialQuantity;
    /**
     * @var int
     */
    public $maxQuantity;

    // Constructor
    public function __construct($id, int $projectID, string $name, int $initialQuantity, int $maxQuantity)
    {
        parent::__construct($id);

        $this->projectID = $projectID;
        $this->name = $name;
        $this->initialQuantity = $initialQuantity;
        $this->maxQuantity = $maxQuantity;
    }

}