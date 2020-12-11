<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once __DIR__.('/../services/admin_api.php');
require_once __DIR__.('/../models/admin.php');

class AdminRepository {

    /**
     * @var AdminAPI
     */
    private static $admin_api;

    private static function init(){
        if(AdminRepository::$admin_api == null){
            AdminRepository::$admin_api = new AdminAPI();
        }
    }

    public static function getAdminByEmailAndPassword(string $email, string $password){
        AdminRepository::init();
        return AdminRepository::$admin_api->getAdminByEmailAndPassword($email, $password);
    }

    public static function getAdminsByEmailOrName(string $text){
        AdminRepository::init();
        return AdminRepository::$admin_api->getAdminsByEmailOrName($text);
    }

    public static function getAdminByEmail(string $email){
        AdminRepository::init();
        return AdminRepository::$admin_api->getAdminByEmail($email);
    }

    public static function addAdmin(Admin $admin, string $newPassword){
        AdminRepository::init();
        return AdminRepository::$admin_api->addAdmin($admin, $newPassword);
    }

    public static function updateAdmin(Admin $admin){
        AdminRepository::init();
        return AdminRepository::$admin_api->updateAdmin($admin);
    }

    public static function updatePassword(Admin $admin, string $newPassword){
        AdminRepository::init();
        return AdminRepository::$admin_api->updatePassword($admin, $newPassword);
    }

    public static function deleteAdmin(Admin $admin, string $pass, bool $force = false){
        AdminRepository::init();
        return AdminRepository::$admin_api->deleteAdmin($admin, $pass, $force);
    }

}