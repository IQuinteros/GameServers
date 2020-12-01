<?php

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