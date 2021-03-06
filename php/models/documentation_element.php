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

class DocumentationElement extends Model{

    /**
     * @var mixed
     */
    public $parentID;
    /**
     * @var string
     */
    public $title;
    /**
     * @var mixed
     */
    public $publishDate;
    /**
     * @var int
     */
    public $likes;
    /**
     * @var int
     */
    public $dislikes;
    /**
     * @var string
     */
    public $content;

    // Constructor
    public function __construct($id, $parentID, string $title, $publishDate, int $likes, int $dislikes, string $content)
    {
        parent::__construct($id);

        $this->parentID = $parentID;
        $this->title = $title;
        $this->publishDate = $publishDate;
        $this->likes = $likes;
        $this->dislikes = $dislikes;
        $this->content = $content;
    }

}