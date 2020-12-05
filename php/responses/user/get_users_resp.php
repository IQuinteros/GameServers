<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

header("Content-Type: application/json; charset=UTF-8");
require_once __DIR__.('/../../repositories/user_repository.php');

// Check data
if (isset($_POST['text'])){

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
    $result = array('Error'=>'Faltan datos para obtener al usuario.', 'POST'=>$_POST);
}

echo json_encode($result);