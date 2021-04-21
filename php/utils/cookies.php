<?php
/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

class CookieManager{

    public static function setCookie(string $name, $value, int $timeToExpire = 0, string $path, string $domain = '', bool $secure = false, bool $httponly = false){
        setCookie($name, $value, $timeToExpire, $domain, $secure, $httponly);
    }

}