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
if (checkRequestData(array('name', 'initial', 'max'))){

    // Check current user
    $currentUser = Login::getCurrentUser();

    if($currentUser == null){ returnError('Usuario actual no válido'); }

    // Find project available

    $projects = ProjectRepository::getProjectsByUserId($currentUser->id);

    if(count($projects) <= 0){ returnError('El usuario no tiene proyectos aún'); }

    $projectRef = $projects[0];


    $newEconomyItem = new EconomyElement(
        null,
        $projectRef->id,
        $_REQUEST['name'],
        (int)$_REQUEST['initial'],
        (int)$_REQUEST['max']
    );

    $addResult = EconomyElementRepository::addEconomyElement($newEconomyItem);

    $result = array('PDO'=>$addResult->errorInfo());

}
else{
    $result = formatError('Faltan datos para crear el nuevo proyecto');
}

echo json_encode($result);