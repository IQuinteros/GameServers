<?php
/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

class SessionManager{

    /**
     * Start Session
     */
    public static function startSession(){
        session_start();
    }

    /**
     * Destroy Session
     */
    public static function destroySession(){
        session_destroy();
    }

    /**
     * Set param in session using $_SESSION
     */
    public static function setSessionParam(string $paramName, $paramValue){
        $_SESSION[$paramName] = $paramValue;
    }

}