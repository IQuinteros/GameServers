<?php
/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

class Token{

	/**
	 * Generate a new token
	 * 
	 * @return string New token
	 */
	public static function generateToken(){
		return sha1(uniqid(rand(), true));
	}


}