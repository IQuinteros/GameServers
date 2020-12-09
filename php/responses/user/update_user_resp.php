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
if (checkRequestData(array('name', 'membersNum', 'contactNum', 'location'))){

    $canAdd = true;

    $localpath = null;

    if(isset($_FILES['image']["tmp_name"])){
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
            
            $canAdd = true;
            
        }
        else{
            $result = formatError('No se ha podido subir el archivo');
            $canAdd = false;
        }
    }

    // If sucess, try add new user
    if($canAdd){

        SessionManager::startSession();
        $email = $_SESSION['email'];

        $toUpdateUser = UserRepository::getUserByEmail($email);

        $toUpdateUser->name = $_POST['name'];
        $toUpdateUser->image = $localpath;
        $toUpdateUser->membersNum = $_POST['membersNum'];
        $toUpdateUser->contactNum = $_POST['contactNum'];
        $toUpdateUser->location = $_POST['location'];

        $addResult = UserRepository::updateUser($toUpdateUser);

        $result = array('PDO'=>$addResult->errorInfo(), 'email' => $toUpdateUser->email);
    }

}
else{
    $result = formatError('Faltan datos para añadir al nuevo usuario');
}

echo json_encode($result);