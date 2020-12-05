<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

header("Content-Type: application/json; charset=UTF-8");
require_once __DIR__.('/../../repositories/user_repository.php');

$path = __DIR__.'/../../../uploads/'; // upload directory
$localpath = '/uploads/';

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extension

// Check data
if (isset($_POST['name']) || isset($_POST['email']) || isset($_FILES['image']["tmp_name"]) || isset($_POST['pass']) ||
    isset($_POST['membersNum']) || isset($_POST['contactNum']) || isset($_POST['location'])){

    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    // Get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

    $final_image = rand(1000,1000000).$img;

    // Check's valid format
    if(!in_array($ext, $valid_extensions)) { 
        $result = array('Error'=>'La extensión no es la correcta', 'POST'=>$_POST); 
        echo json_encode($result);
        return;
    }

    $path = $path.strtolower($final_image); // Real path to image
    $localpath = $localpath.strtolower($final_image); // Path to image from root

    // Try move file from temp to path
    if(move_uploaded_file($tmp,$path)) 
    {
        $newUser = new User(
            null, $_POST['name'], $_POST['email'],
            $localpath, $_POST['membersNum'], $_POST['contactNum'], $_POST['location'], null, null
        );

        $addResult = UserRepository::addUser($newUser, $_POST['pass']);

        $result = array('PDO'=>$addResult->errorInfo());
    }
    else{
        $result = array('Error'=>'No se ha podido subir el archivo', 'POST'=>$_POST);
    }

}
else{
    $result = array('Error'=>'Faltan datos para poder añadir un nuevo usuario.', 'POST'=>$_POST);
}

echo json_encode($result);