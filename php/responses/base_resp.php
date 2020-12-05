<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

/* BaseResp is the base for any response */

header("Content-Type: application/json; charset=UTF-8");

/**
 * For any error, call this method
 */
function formatError(string $errorMessage){
    return array('Error'=>$errorMessage, 'REQUEST'=>$_REQUEST);
}

/**
 * Valid extensions of images
 */
function getValidImageExtensions(){
    return array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); 
}

/**
 * Get upload directory
 * 
 * @var bool $isLocal True: /path/ False: __DIR__ + path
 */
function getUploadDirectory(bool $isLocal = false){
    return $isLocal? '/uploads/' : __DIR__.'/../../uploads/';
}

/**
 * Get random name with base
 * 
 * @var string $base Base name to put in final random name
 */
function getRandomName(string $base){
    return rand(1000,1000000).'_'.rand(0, 9).$base;
}

/**
 * Get path extension
 * 
 * @var string $file File name to get extension
 */
function getPathExtension(string $file){
    return strtolower(pathinfo($file, PATHINFO_EXTENSION));
}

/**
 * Check data of _REQUEST
 * 
 * @var array $data All data names to check in _REQUEST
 */
function checkRequestData(array $data){
    foreach($data as $elem){
        if(!isset($_REQUEST[$elem])){ return false; }
    }
    return true;
}