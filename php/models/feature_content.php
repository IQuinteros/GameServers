<?php

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
     * @var string
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
    public function __construct($id, string $title, string $description, string $image, string $docsUrl)
    {
        parent::__construct($id);

        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->docsUrl = $docsUrl;
    }

}