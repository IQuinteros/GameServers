<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once __DIR__.('/../services/user_api.php');
require_once __DIR__.('/../models/user.php');

class UserRepository {

    /**
     * @var UserAPI
     */
    private static $user_api;

    private static function init(){
        if(UserRepository::$user_api == null){
            UserRepository::$user_api = new UserAPI();
        }
    }

    public static function getUserByEmailAndPassword(string $email, string $password){
        UserRepository::init();
        return UserRepository::$user_api->getUserByEmailAndPassword($email, $password);
    }

    public static function getUsersByEmailOrName(string $text){
        UserRepository::init();
        return UserRepository::$user_api->getUsersByEmailOrName($text);
    }

    public static function getUsersById(array $users){
        UserRepository::init();
        return UserRepository::$user_api->getUsersById($users);
    }

    public static function getUserByEmail(string $email){
        UserRepository::init();
        return UserRepository::$user_api->getUserByEmail($email);
    }

    public static function addUser(User $user, string $newPassword){
        UserRepository::init();
        return UserRepository::$user_api->addUser($user, $newPassword);
    }

    public static function updateUser(User $user){
        UserRepository::init();
        return UserRepository::$user_api->updateUser($user);
    }

    public static function touchLastConnection(User $user){
        UserRepository::init();
        return UserRepository::$user_api->touchLastConnection($user);
    }

    public static function updatePassword(User $user, string $newPassword){
        UserRepository::init();
        return UserRepository::$user_api->updatePassword($user, $newPassword);
    }

    public static function deleteUser(User $user, string $pass, bool $force = false){
        UserRepository::init();
        return UserRepository::$user_api->deleteUser($user, $pass, $force);
    }

    public static function deleteUsers(array $users){
        UserRepository::init();
        return UserRepository::$user_api->deleteUsers($users);
    }

}