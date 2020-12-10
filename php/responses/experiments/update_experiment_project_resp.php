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

// Check data
if (checkRequestData(array('id', 'name', 'description'))){

    // Check current user
    $currentUser = Login::getCurrentUser();

    if($currentUser == null){ returnError('Usuario actual no válido'); }

    // Find project available

    $projects = ProjectRepository::getProjectsByUserId($currentUser->id);

    if(count($projects) <= 0){ returnError('El usuario no tiene proyectos aún'); }

    $projectRef = $projects[0];

    // Update element economy

    // Security check
    $experimentElement = ExperimentElementRepository::getExperimentElementOfProjectById($projectRef->id, (int)$_REQUEST['id']);

    if($experimentElement == null || $experimentElement == false){ returnError('El experimento no fue encontrado'); }

    $experimentElement->name = $_REQUEST['name'];
    $experimentElement->description = $_REQUEST['description'];

    $addResult = ExperimentElementRepository::updateExperimentElement($experimentElement);

    $result = array('PDO'=>$addResult->errorInfo());

}
else{
    $result = formatError('Faltan datos para actualizar los datos del experimento');
}

echo json_encode($result);