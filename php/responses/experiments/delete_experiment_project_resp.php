<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once __DIR__.('/../base_resp.php');
require_once __DIR__.('/../../utils/login.php');
require_once __DIR__.('/../../repositories/project_repository.php');
require_once __DIR__.('/../../repositories/experiment_element_repository.php');

if(!checkRequestData(array('items'))){ returnError('No hay experimentos para eliminar'); }

// Check current user
$currentUser = Login::getCurrentUser();

if($currentUser == null){ returnError('Usuario actual no válido'); }

// Find project available

$projects = ProjectRepository::getProjectsByUserId($currentUser->id);

if(count($projects) <= 0){ returnError('El usuario no tiene proyectos aún'); }

$projectRef = $projects[0];

// Delete experiments

$response = ExperimentElementRepository::deleteExperimentElements($_REQUEST['items']);

if($response == false){
    $result = formatError('Se ha producido un error');
}
else{
    $result = array('result' => true, 'PDO: ' => $response);
}


echo json_encode($result);