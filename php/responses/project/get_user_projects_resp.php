<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once __DIR__.('/../base_resp.php');
require_once __DIR__.('/../../utils/login.php');
require_once __DIR__.('/../../repositories/project_repository.php');

$currentUser = Login::getCurrentUser();

if($currentUser == null){ $result = formatError('Usuario actual no válido');  echo json_encode($result);  return;}

$projects = ProjectRepository::getProjectsByUserId($currentUser->id);

$result = array();

foreach($projects as $projectRef){
    array_push($result, array(
        'id' => $projectRef->id,
        'name' => $projectRef->name,
        'planID' => $projectRef->planID,
        'estimatedPlayers' => $projectRef->estimatedPlayers,
        'teamQuantity' => $projectRef->teamQuantity,
        'region' => $projectRef->region,
        'registerDate' => $projectRef->registerDate,
        'status' => $projectRef->status
    ));
}

echo json_encode($result);