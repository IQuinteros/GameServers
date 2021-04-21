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
if(!checkRequestData(array('items'))){ returnError('No hay cuentas para eliminar'); }

// Check current admin
$currentAdmin = Login::getCurrentAdmin();

if($currentAdmin == null){ returnError('Administrador actual no válido'); }

$response = UserRepository::deleteUsers($_REQUEST['items']);

if($response == false){
    $result = formatError('Ha ocurrido un error eliminando las cuentas de clientes');
}
else{
    $result = array('result' => true);
}



echo json_encode($result);