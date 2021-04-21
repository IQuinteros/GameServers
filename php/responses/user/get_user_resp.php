<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once __DIR__.('/../base_resp.php');
require_once __DIR__.('/../../repositories/user_repository.php');

// Check data
if (checkRequestData(array('email', 'pass'))){

    $user = UserRepository::getUserByEmailAndPassword($_POST['email'], $_POST['pass']);

    if($user == false || $user == null){ 
        $result = formatError('No se ha encontrado al usuario');
    }
    else{
        $result = array(
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

}
else{
    $result = formatError('Faltan datos para obtener al usuario');
}

echo json_encode($result);