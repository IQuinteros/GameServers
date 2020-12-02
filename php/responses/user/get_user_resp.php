<?php
header("Content-Type: application/json; charset=UTF-8");
require_once __DIR__.('/../../repositories/user_repository.php');

// Check data
if (isset($_POST['email']) || isset($_POST['pass'])){

    $user = UserRepository::getUserByEmailAndPassword($_POST['email'], $_POST['pass']);

    if($user == false || $user == null){ 
        $result = array('Error'=>'No se ha encontrado al usuario', 'POST'=>$_POST); 
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
    $result = array('Error'=>'Faltan datos para obtener al usuario.', 'POST'=>$_POST);
}

echo json_encode($result);