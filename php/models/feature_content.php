<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

/**
 * Feature Model
*/

require_once('model.php');

class FeatureContent extends Model{

    /**
     * @var int
     */
    public $featureID;
    /**
     * @var mixed
     */
    public $image;
    /**
     * @var string
     */
    public $title;
    /**
     * @var string
     */
    public $content;
    /**
     * @var string
     */
    public $docsUrl;


    // Constructor
    public function __construct($id, string $title, string $description, $image, string $docsUrl)
    {
        parent::__construct($id);

        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->docsUrl = $docsUrl;
    }

}