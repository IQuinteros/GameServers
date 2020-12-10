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

// Find current user

$currentUser = Login::getCurrentUser();

if($currentUser == null){ returnError('Usuario actual no válido'); }

// Find project available

$projects = ProjectRepository::getProjectsByUserId($currentUser->id);

if(count($projects) <= 0){ returnError('El usuario no tiene proyectos aún'); }

$projectRef = $projects[0];

// Find economy
$toSearch = '';

if(checkRequestData(array('toSearch'))){
     $toSearch =  $_REQUEST['toSearch'];
}

$economies = EconomyElementRepository::getEconomyElementsBySearch($projectRef->id, $toSearch);

$result = array();

foreach($economies as $economyRef){
    array_push($result, array(
        'id' => $economyRef->id,
        'projectID' => $economyRef->projectID,
        'name' => $economyRef->name,
        'initialQuantity' => $economyRef->initialQuantity,
        'maxQuantity' => $economyRef->maxQuantity,
    ));
}

echo json_encode($result);