<?php
/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once('base_api.php');
require_once __DIR__.('/../models/admin.php');
require_once __DIR__.('/../utils/password.php');

class AdminAPI extends BaseAPI {

    // Constructor
    public function __construct(){
        parent::__construct();
        $this->TABLE_NAME = 'admin';
    }

    /**
     * Get admin by email and password
     * @var string $email The email of the expected admin
     * @var string $password The password of the expected admin
     */
    public function getAdminByEmailAndPassword(string $email, string $password){
        $this->open();

        $result = $this->query('SELECT * FROM '.$this->TABLE_NAME.' WHERE email=:email AND password=:password', array(
            new QueryParam(':email', $email),
            new QueryParam(':password', PasswordManager::encryptPassword($password))
        ));

        // Close connection
        $this->close();

        // Check if is found
        if($result->rowCount() > 0){

            // Check result
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                $foundAdmin = new Admin(
                    $row->id,
                    $row->email,
                    $row->lastConnection
                );

                return $foundAdmin;
            }

        }
        else{
            // It isn't found so return false
            return false;
        }

    }

    /**
     * Get admin by email or name
     * @var string $email The email of the expected admin
     * @var string $password The password of the expected admin
     */
    public function getAdminsByEmailOrName(string $text){
        $this->open();

        $result = $this->query('SELECT * FROM '.$this->TABLE_NAME.' WHERE email LIKE :text OR name LIKE :text', array(
            new QueryParam(':text', '%'.$text.'%'),
        ));

        // Close connection
        $this->close();

        // Check if is found
        if($result->rowCount() > 0){

            $admins = array();

            // Check result
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                $foundAdmin = new Admin(
                    $row->id,
                    $row->email,
                    $row->lastConnection
                );

                array_push($admins, $foundAdmin);
            }

            return $admins;

        }
        else{
            // It isn't found so return false
            return array();
        }

    }

    /**
     * Get admin by specific email
     * @var string $email The email of the expected admin
     */
    public function getAdminByEmail(string $email){
        $this->open();

        $result = $this->query('SELECT * FROM '.$this->TABLE_NAME.' WHERE email = :email', array(
            new QueryParam(':email', $email),
        ));

        // Close connection
        $this->close();

        // Check if is found
        if($result->rowCount() > 0){

            // Check result
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                $foundAdmin = new Admin(
                    $row->id,
                    $row->email,
                    $row->lastConnection
                );

                return $foundAdmin;
            }

        }
        else{
            // It isn't found so return false
            return null;
        }

    }

    /**
     * Add new admin
     * 
     * @var Admin $admin Admin data
     * @var string $newPassword The admin password
     */
    public function addAdmin(Admin $admin, string $newPassword){
        $this->open();

        $result = $this->query('INSERT INTO '.$this->TABLE_NAME.' VALUES ('.
            'NULL,:email,:password,:lastConnectionDate)', array(
                new QueryParam(':email', $admin->email),
                new QueryParam(':password', PasswordManager::encryptPassword($newPassword)),
                new QueryParam(':lastConnectionDate', (date ("Y-m-d H:i:s")))
            )
        );

        $this->close();

        return $result;
    }

    /**
     * Update admin data (Not including password)
     * 
     * @var Admin $admin New admin data
     */
    public function updateAdmin(Admin $admin){
        $this->open();

        $result = $this->query('UPDATE '.$this->TABLE_NAME.' SET '.
            'lastConnectionDate=:lastConnectionDate WHERE id=:id', array(
                new QueryParam(':id', $admin->id, PDO::PARAM_INT),
                new QueryParam(':lastConnectionDate', $admin->lastConnectionDate, PDO::PARAM_INT)
            )
        );

        $this->close();

        return $result;
    }

    /**
     * Update admin password
     * 
     * @var Admin $admin The admin to modify
     * @var string $newPassword The new password
     */
    public function updatePassword(Admin $admin, string $newPassword){
        $this->open();

        $result = $this->query('UPDATE '.$this->TABLE_NAME.' SET '.
            'password=:password WHERE id=:id', array(
                new QueryParam(':id', $admin->id, PDO::PARAM_INT),
                new QueryParam(':password', PasswordManager::encryptPassword($newPassword))
            )
        );

        $this->close();

        return $result;
    }

    /**
     * Delete admin - Use carefully
     * 
     * @var Admin $admin Admin to delete
     * @var string $pass Password (for security)
     * @var bool $force Force deletion (true -> Ignore password)
     */
    public function deleteAdmin(Admin $admin, string $pass, bool $force = false){
        if(!$force){

            $toDeleteAdmin = $this->getAdminByEmailAndPassword($admin->email, $pass);

            if($toDeleteAdmin == null){ return false; }

        }

        $this->open();

        $result = $this->query('DELETE FROM '.$this->TABLE_NAME.' WHERE id=:id', array(
                new QueryParam(':id', $admin->id, PDO::PARAM_INT)
            )
        );

        $this->close();

        return $result;
    }

}
