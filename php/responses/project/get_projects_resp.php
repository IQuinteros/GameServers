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

$toSearch = '';
if(checkRequestData(array('toSearch'))){
    $toSearch =  $_REQUEST['toSearch'];
}

// Find current admin

$currentAdmin = Login::getCurrentAdmin();

if($currentAdmin == null){ returnError('Administrador actual no válido'); }

// Find projects

$projects = ProjectRepository::getProjectsBySearch($toSearch);

$result = array();

foreach($projects as $projectRef){
    array_push($result, array(
        'id' => $projectRef->id,
        'userID' => $projectRef->userID,
        'name' => $projectRef->name,
        'planID' => $projectRef->planID,
        'estimatedPlayers' => $projectRef->estimatedPlayers,
        'teamQuantity' => $projectRef->teamQuantity,
        'region' => $projectRef->region,
        'registerDate' => $projectRef->registerDate,
        'status' => $projectRef->status->__toString(),
        'userEmail' => $projectRef->userEmail,
        'planName' => $projectRef->planName
    ));
}

echo json_encode($result);