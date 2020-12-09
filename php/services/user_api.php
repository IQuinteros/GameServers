<?php
/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once('base_api.php');
require_once __DIR__.('/../models/user.php');
require_once __DIR__.('/../utils/password.php');

class UserAPI extends BaseAPI {

    // Constructor
    public function __construct(){
        parent::__construct();
        $this->TABLE_NAME = 'users';
    }

    /**
     * Get user by email and password
     * @var string $email The email of the expected user
     * @var string $password The password of the expected user
     */
    public function getUserByEmailAndPassword(string $email, string $password){
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
                $foundUser = new User(
                    $row->id,
                    $row->name,
                    $row->email,
                    $row->image,
                    $row->membersNum,
                    $row->contactNum,
                    $row->location,
                    $row->registerDate,
                    $row->lastConnectionDate
                );

                return $foundUser;
            }

        }
        else{
            // It isn't found so return false
            return false;
        }

    }

    /**
     * Get user by email or name
     * @var string $email The email of the expected user
     * @var string $password The password of the expected user
     */
    public function getUsersByEmailOrName(string $text){
        $this->open();

        $result = $this->query('SELECT * FROM '.$this->TABLE_NAME.' WHERE email LIKE :text OR name LIKE :text', array(
            new QueryParam(':text', '%'.$text.'%'),
        ));

        // Close connection
        $this->close();

        // Check if is found
        if($result->rowCount() > 0){

            $users = array();

            // Check result
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                $foundUser = new User(
                    $row->id,
                    $row->name,
                    $row->email,
                    $row->image,
                    $row->membersNum,
                    $row->contactNum,
                    $row->location,
                    $row->registerDate,
                    $row->lastConnectionDate
                );

                array_push($users, $foundUser);
            }

            return $users;

        }
        else{
            // It isn't found so return false
            return array();
        }

    }

    /**
     * Get user by specific email
     * @var string $email The email of the expected user
     */
    public function getUserByEmail(string $email){
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
                $foundUser = new User(
                    $row->id,
                    $row->name,
                    $row->email,
                    $row->image,
                    $row->membersNum,
                    $row->contactNum,
                    $row->location,
                    $row->registerDate,
                    $row->lastConnectionDate
                );

                return $foundUser;
            }

        }
        else{
            // It isn't found so return false
            return null;
        }

    }

    /**
     * Add new user
     * 
     * @var User $user User data
     * @var string $newPassword The user password
     */
    public function addUser(User $user, string $newPassword){
        $this->open();

        $result = $this->query('INSERT INTO '.$this->TABLE_NAME.' VALUES ('.
            'NULL,:name,:email,:password,:image,:membersNum,:contactNum,:location,:registerDate,:lastConnectionDate)', array(
                new QueryParam(':name', $user->name),
                new QueryParam(':email', $user->email),
                new QueryParam(':password', PasswordManager::encryptPassword($newPassword)),
                new QueryParam(':image', $user->image),
                new QueryParam(':membersNum', $user->membersNum, PDO::PARAM_INT),
                new QueryParam(':contactNum', $user->contactNum, PDO::PARAM_INT),
                new QueryParam(':location', $user->location),
                new QueryParam(':registerDate', (date ("Y-m-d H:i:s"))),
                new QueryParam(':lastConnectionDate', (date ("Y-m-d H:i:s")))
            )
        );

        $this->close();

        return $result;
    }

    /**
     * Update user data (Not including password)
     * 
     * @var User $user New user data
     */
    public function updateUser(User $user){
        $this->open();

        $result = $this->query('UPDATE '.$this->TABLE_NAME.' SET '.
            'name=:name, image=:image, membersNum=:membersNum, contactNum=:contactNum, location=:location WHERE id=:id', array(
                new QueryParam(':id', $user->id, PDO::PARAM_INT),
                new QueryParam(':name', $user->name),
                new QueryParam(':image', $user->image),
                new QueryParam(':membersNum', $user->membersNum, PDO::PARAM_INT),
                new QueryParam(':contactNum', $user->contactNum, PDO::PARAM_INT),
                new QueryParam(':location', $user->location)
            )
        );

        $this->close();

        return $result;
    }

    /**
     * Update user password
     * 
     * @var User $user The user to modify
     * @var string $newPassword The new password
     */
    public function updatePassword(User $user, string $newPassword){
        $this->open();

        $result = $this->query('UPDATE '.$this->TABLE_NAME.' SET '.
            'password=:password WHERE id=:id', array(
                new QueryParam(':id', $user->id, PDO::PARAM_INT),
                new QueryParam(':password', PasswordManager::encryptPassword($newPassword))
            )
        );

        $this->close();

        return $result;
    }

    /**
     * Delete user - Use carefully
     * 
     * @var User $user User to delete
     * @var string $pass Password (for security)
     * @var bool $force Force deletion (true -> Ignore password)
     */
    public function deleteUser(User $user, string $pass, bool $force = false){
        if(!$force){

            $toDeleteUser = $this->getUserByEmailAndPassword($user->email, $pass);

            if($toDeleteUser == null){ return false; }

        }

        $this->open();

        $result = $this->query('DELETE FROM '.$this->TABLE_NAME.' WHERE id=:id', array(
                new QueryParam(':id', $user->id, PDO::PARAM_INT)
            )
        );

        $this->close();

        return $result;
    }

}
