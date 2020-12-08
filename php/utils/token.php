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

	/* Check is is logged */
	public static function checkToken(){
		if(!isset($_SESSION['token'])){
			return false;
		}
		if(!isset($_COOKIE['token'])){
			return false;
		}
		if($_SESSION['token']!=$_COOKIE['token'])
		{
			return false;
		}
	}

	/* Check token and go to url if token checking is false */
	public static function checkOrGoToken(string $url){
		$response = Token::checkToken();
		
		if(!$response){
			header('location:'.$url);
			exit();
		}

		return $response;
	}
}