<?php

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

    public static function addUser(User $user, string $newPassword){
        UserRepository::init();
        return UserRepository::$user_api->addUser($user, $newPassword);
    }

    public static function updateUser(User $user){
        UserRepository::init();
        return UserRepository::$user_api->updateUser($user);
    }

    public static function updatePassword(User $user, string $newPassword){
        UserRepository::init();
        return UserRepository::$user_api->updatePassword($user, $newPassword);
    }

    public static function deleteUser(User $user){
        UserRepository::init();
        return UserRepository::$user_api->deleteUser($user);
    }

}