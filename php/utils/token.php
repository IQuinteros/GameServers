<?php
/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once('login.php');

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
		SessionManager::startSession();

		$tokenName = Token::getTokenName();

		if(!isset($_SESSION[$tokenName])){
			return false;
		}
		if(!isset($_COOKIE[$tokenName])){
			return false;
		}
		if($_SESSION[$tokenName]!=$_COOKIE[$tokenName])
		{
			return false;
		}

		return true;
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

	/**
     * Generate the token name to set
     */
    public static function getTokenName(){
        return 'aatiqgserv';   // Current day
    }
}