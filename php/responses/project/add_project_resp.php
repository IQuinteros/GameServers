<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once __DIR__.('/../base_resp.php');
require_once __DIR__.('/../../utils/login.php');
require_once __DIR__.('/../../repositories/project_repository.php');

// Check data
if (checkRequestData(array('name', 'plan', 'players', 'team', 'region'))){

    // Check current user
    $currentUser = Login::getCurrentUser();

    if($currentUser == null){ $result = formatError('Usuario actual no válido');  echo json_encode($result); return; }

    $newProject = new Project(
        null, 
        $currentUser->id, 
        $_REQUEST['name'], 
        (int)$_REQUEST['plan'], 
        (int)$_REQUEST['players'], 
        (int)$_REQUEST['team'], 
        $_REQUEST['region'], 
        null, 
        new ProjectStatus(ProjectStatus::Active)
    );

    $addResult = ProjectRepository::addProject($newProject);

    $result = array('PDO'=>$addResult->errorInfo());

}
else{
    $result = formatError('Faltan datos para crear el nuevo proyecto');
}

echo json_encode($result);