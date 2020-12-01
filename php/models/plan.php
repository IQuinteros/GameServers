<?php

/**
 * Plan Model
*/

require_once('model.php');

class Plan extends Model{

    /**
     * @var string
     */
    public $name;
    /**
     * @var float
     */
    public $price;
    /**
     * @var string
     */
    public $detail;
    /**
     * @var string
     */
    public $docsUrl;


    // Constructor
    public function __construct($id, string $name, float $price, string $detail, string $docsUrl)
    {
        parent::__construct($id);

        $this->name = $name;
        $this->price = $price;
        $this->detail = $detail;
        $this->docsUrl = $docsUrl;
    }

}