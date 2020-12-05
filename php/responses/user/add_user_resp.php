<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once __DIR__.('/../base_resp.php');
require_once __DIR__.('/../../repositories/user_repository.php');

// Check data
if (checkRequestData(array('name', 'email', 'pass', 'membersNum', 'contactNum', 'location')) &&
    isset($_FILES['image']["tmp_name"])){

    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    // Get uploaded file's extension
    $ext = getPathExtension($img);
    // Get a random name for new image
    $final_image = getRandomName($img);

    // Check's valid format
    if(!in_array($ext, getValidImageExtensions())) { 
        $result = formatError('La extensión no es permitida');
        echo json_encode($result);
        return;
    }

    $path = getUploadDirectory().strtolower($final_image); // Real path to image
    $localpath = getUploadDirectory(true).strtolower($final_image); // Path to image from root

    // Try move file from temp to path
    if(move_uploaded_file($tmp,$path)) 
    {
        // If sucess, try add new user
        $newUser = new User(
            null, $_POST['name'], $_POST['email'],
            $localpath, $_POST['membersNum'], $_POST['contactNum'], $_POST['location'], null, null
        );

        $addResult = UserRepository::addUser($newUser, $_POST['pass']);

        $result = array('PDO'=>$addResult->errorInfo());
    }
    else{
        $result = formatError('No se ha podido subir el archivo');
    }

}
else{
    $result = formatError('Faltan datos para añadir al nuevo usuario');
}

echo json_encode($result);