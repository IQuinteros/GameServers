<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

class PasswordManager{

    /**
     * @var string $password Explicit Password
     * 
     * @return string Encrypted password
     */
    public static function encryptPassword($password){
        return md5($password);
    }

}