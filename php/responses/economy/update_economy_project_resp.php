<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once __DIR__.('/../base_resp.php');
require_once __DIR__.('/../../utils/login.php');
require_once __DIR__.('/../../repositories/project_repository.php');
require_once __DIR__.('/../../repositories/economy_element_repository.php');

// Check data
if (checkRequestData(array('id', 'name', 'initial', 'max'))){

    // Check current user
    $currentUser = Login::getCurrentUser();

    if($currentUser == null){ returnError('Usuario actual no válido'); }

    // Find project available

    $projects = ProjectRepository::getProjectsByUserId($currentUser->id);

    if(count($projects) <= 0){ returnError('El usuario no tiene proyectos aún'); }

    $projectRef = $projects[0];

    // Update element economy

    // Security check
    $economyElement = EconomyElementRepository::getEconomyElementOfProjectById($projectRef->id, (int)$_REQUEST['id']);

    if($economyElement == null){ returnError('El elemento no fue encontrado'); }

    $economyElement->name = $_REQUEST['name'];
    $economyElement->initialQuantity = $_REQUEST['initial'];
    $economyElement->maxQuantity = $_REQUEST['max'];

    $addResult = EconomyElementRepository::updateEconomyElement($economyElement);

    $result = array('PDO'=>$addResult->errorInfo());

}
else{
    $result = formatError('Faltan datos para actualizar los datos del elemento');
}

echo json_encode($result);