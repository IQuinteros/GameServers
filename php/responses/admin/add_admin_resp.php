<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once __DIR__.('/../base_resp.php');
require_once __DIR__.('/../../utils/login.php');
require_once __DIR__.('/../../repositories/admin_repository.php');

// Check data
if (checkRequestData(array('email', 'pass'))){


    $newAdmin = new Admin(
        null, $_REQUEST['email'], null
    );

    $addResult = AdminRepository::addAdmin($newAdmin, $_REQUEST['pass']);

    $result = array('PDO'=>$addResult->errorInfo());

}
else{
    $result = formatError('Faltan datos para añadir al nuevo administrador');
}

echo json_encode($result);