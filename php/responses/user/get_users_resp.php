<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once __DIR__.('/../base_resp.php');
require_once __DIR__.('/../../repositories/user_repository.php');

// Check data
if (checkRequestData(array('text'))){

    $users = UserRepository::getUsersByEmailOrName($_POST['text']);

    if(count($users) > 0){
        $result = array();
        foreach($users as $userRef){
            array_push($result, array(
                'id' => $userRef->id,
                'name' => $userRef->name,
                'email' => $userRef->email,
                'image' => $userRef->image,
                'membersNum' => $userRef->membersNum,
                'contactNum' => $userRef->contactNum,
                'location' => $userRef->location,
                'registerDate' => $userRef->registerDate,
                'lastConnectionDate' => $userRef->lastConnectionDate
            ));
        }
    }
    else{
        $result = array(); 
    }

}
else{
    $result = formatError('Faltan datos para obtener al usuario');
}

echo json_encode($result);