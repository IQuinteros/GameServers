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
if (checkRequestData(array('name', 'plan', 'region'))){

    // Check current user
    $currentUser = Login::getCurrentUser();

    if($currentUser == null){ $result = formatError('Usuario actual no válido');  echo json_encode($result); return; }

    $projects = ProjectRepository::getProjectsByUserId($currentUser->id);

    if(count($projects) <= 0){
        $result = formatError('No hay proyectos vinculados con este usuario');
        echo json_encode($result);
        return;
    }

    $projectRef = $projects[0];
    $projectRef->name = $_REQUEST['name'];
    $projectRef->planID = (int)$_REQUEST['plan'];
    $projectRef->region = $_REQUEST['region'];

    // Check status to update
    if(checkRequestData(array('status'))){
        if(!empty($_REQUEST['status'])){
            $projectRef->status = new ProjectStatus($_REQUEST['status']);
        }
    }

    $addResult = ProjectRepository::updateProject($projectRef);

    $result = array('PDO'=>$addResult->errorInfo());

}
else{
    $result = formatError('Faltan datos para actualizar los datos del proyecto');
}

echo json_encode($result);