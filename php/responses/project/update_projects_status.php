<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once __DIR__.('/../base_resp.php');
require_once __DIR__.('/../../utils/login.php');
require_once __DIR__.('/../../repositories/project_repository.php');

if(!checkRequestData(array('items', 'status'))){ returnError('No hay elementos para eliminar'); }

// Check current admin
$currentAdmin = Login::getCurrentAdmin();

if($currentAdmin == null){ returnError('Administrador actual no válido'); }

// Update admin

$newStatus = true;
if($_REQUEST['status'] == 'inactive'){
	$newStatus = false;
}

$response = ProjectRepository::updateStatus($_REQUEST['items'], new ProjectStatus($newStatus? ProjectStatus::Active : ProjectStatus::Inactive));

if($response == false){
    $result = formatError('Se ha producido un error');
}
else{
    $result = array('result' => true, 'PDO: ' => $response);
}


echo json_encode($result);