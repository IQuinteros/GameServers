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
            while($row = $result->fetch()){
                $foundUser = new User(
                    $row['id'],
                    $row['name'],
                    $row['email'],
                    $row['image'],
                    $row['membersNum'],
                    $row['contactNum'],
                    $row['location'],
                    $row['registerDate'],
                    $row['lastConnectionDate']
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
                new QueryParam(':registerDate', $user->registerDate),
                new QueryParam(':lastConnectionDate', $user->lastConnectionDate)
            )
        );

        $this->close();

        if($result == false){ return false; } else { return true; }
    }

    /**
     * Update user data (Not including password)
     * 
     * @var User $user New user data
     */
    public function updateUser(User $user){
        $this->open();

        $result = $this->query('UPDATE '.$this->TABLE_NAME.' SET '.
            'name=:name, email=:email, image=:image, membersNum=:membersNum, contactNum=:contactNum, location=:location, registerDate=:registerDate, lastConnectionDate=:lastConnectionDate WHERE id=:id', array(
                new QueryParam(':id', $user->id, PDO::PARAM_INT),
                new QueryParam(':name', $user->name),
                new QueryParam(':email', $user->email),
                new QueryParam(':image', $user->image),
                new QueryParam(':membersNum', $user->membersNum, PDO::PARAM_INT),
                new QueryParam(':contactNum', $user->contactNum, PDO::PARAM_INT),
                new QueryParam(':location', $user->location),
                new QueryParam(':registerDate', $user->registerDate),
                new QueryParam(':lastConnectionDate', $user->lastConnectionDate)
            )
        );

        $this->close();

        if($result == false){ return false; } else { return true; }
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
            'password=:name WHERE id=:id', array(
                new QueryParam(':id', $user->id, PDO::PARAM_INT),
                new QueryParam(':password', PasswordManager::encryptPassword($newPassword))
            )
        );

        $this->close();

        if($result == false){ return false; } else { return true; }
    }

    /**
     * Delete user - Use carefully
     * 
     * @var User $user User to delete
     */
    public function deleteUser(User $user){
        $this->open();

        $result = $this->query('DELETE FROM '.$this->TABLE_NAME.' WHERE id=:id', array(
                new QueryParam(':id', $user->id, PDO::PARAM_INT)
            )
        );

        $this->close();

        if($result == false){ return false; } else { return true; }
    }

}
