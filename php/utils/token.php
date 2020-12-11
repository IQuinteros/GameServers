<?php
/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once __DIR__.('/login.php');

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
	public static function checkOrGoToken(string $url, bool $inverse = false){
		$response = Token::checkToken();

		if($inverse? $response : !$response){
			header('location:'.$url);
			exit();
		}

		return $response;
	}

	/**
     * Generate the token name to set
     */
    public static function getTokenName(){
        return 'aatiqgservgservers';   // Current day
	}
	
	/* FOR ADMIN */

	/* Check admin token and go to url if admin token checking is false */
	public static function checkOrGoAdminToken(string $url, bool $inverse = false){
		$response = Token::checkAdminToken();

		if($inverse? $response : !$response){
			header('location:'.$url);
			exit();
		}

		return $response;
	}

	/* Check is admin is logged */
	public static function checkAdminToken(){
		SessionManager::startSession();

		$tokenName = Token::getAdminTokenName();

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

	/**
     * Generate the token name to set - ADMIN
     */
    public static function getAdminTokenName(){
        return 'admtisdjfsnjksgerservers';   // Current day
    }
}