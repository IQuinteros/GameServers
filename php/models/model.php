<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

/**
 * Base Model
*/

class Model{

    public $id;

    // Constructor
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the image decoded. This have to be in src of an image
     */
    public function parseImage($encodedImage){
        return 'data:image/jpeg;base64,'.base64_encode( $encodedImage );
    }

}