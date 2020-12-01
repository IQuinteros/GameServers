<?php

/**
 * Feature Model
*/

require_once('model.php');

class Feature extends Model{

    /**
     * @var string
     */
    public $title;
    /**
     * @var string
     */
    public $description;
    /**
     * @var string
     */
    public $image;
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