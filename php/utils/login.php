<?php
/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once('token.php');
require_once('session.php');
require_once('cookies.php');
require_once __DIR__.('/../config.php');
require_once __DIR__.('/../repositories/user_repository.php');

class Login{

    /**
     * Try login from email and pass
     */
    public static function tryLogin(string $email, string $pass){
        SessionManager::startSession();
        $nameToken = Token::getTokenName(); 

        $user = UserRepository::getUserByEmailAndPassword($email, $pass);

        if($user == false || $user == null){ 
            $result = array('error' => 'Usuario no encontrado');
            setCookie($nameToken, '', time()-1, '/');
            SessionManager::destroySession();
        }
        else{
            // Logged
            $token = Token::generateToken();
            $timeExpire = time() + 60 * 60 * 24 * 31;

            setCookie($nameToken, $token, $timeExpire, '/');
            SessionManager::setSessionParam('email', $email);
            SessionManager::setSessionParam($nameToken, $token);

            $result =  array(
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'image' => $user->image,
                'membersNum' => $user->membersNum,
                'contactNum' => $user->contactNum,
                'location' => $user->location,
                'registerDate' => $user->registerDate,
                'lastConnectionDate' => $user->lastConnectionDate
            );
        }

        return $result;
    }

    /**
     * Get current user of session
     */
    public static function getCurrentUser(bool $obligatory = true){
        if(!Token::checkToken()){ return null; }

        SessionManager::startSession();

        $email = $_SESSION['email'];

        $user = UserRepository::getUserByEmail($email);

        if($user == null && $obligatory){
            Login::closeSession();
            header('location:'.ROUTE_LOGIN);
            exit();
        }

        return $user;
    }


    /**
     * Close session if exists
     */
    public static function closeSession(){
        $nameToken = Token::getTokenName(); 
        
        setCookie($nameToken, '', time()-1, '/');
        SessionManager::destroySession();
    }

}