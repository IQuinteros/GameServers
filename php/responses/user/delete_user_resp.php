<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once __DIR__.('/../base_resp.php');
require_once __DIR__.('/../../utils/login.php');
require_once __DIR__.('/../../repositories/user_repository.php');

// Check data
if (checkRequestData(array('pass'))){

    $currentUser = Login::getCurrentUser(false);

    if($currentUser == null){ 
        $result = formatError('El usuario actual no es válido'); 
        echo json_encode($result); 
        return;
    }

    $pass = $_REQUEST['pass'];

    $response = UserRepository::deleteUser($currentUser, $pass);

    if($response == false){
        $result = formatError('La contraseña no coincide. Intente nuevamente');
    }
    else{
        $result = array('result' => true);
        Login::closeSession();
    }

}
else{
    $result = formatError('La contraseña no está presente');
}

echo json_encode($result);