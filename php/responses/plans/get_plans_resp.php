<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once __DIR__.('/../base_resp.php');
require_once __DIR__.('/../../utils/login.php');
require_once __DIR__.('/../../repositories/project_repository.php');
require_once __DIR__.('/../../repositories/plan_repository.php');


$toSearch = '';
if(checkRequestData(array('toSearch'))){
    $toSearch =  $_REQUEST['toSearch'];
}

// Find current user

$currentAdmin = Login::getCurrentAdmin();

if($currentAdmin == null){ returnError('Administrador actual no válido'); }

// Find project available

$plans = PlanRepository::getPlansBySearch($toSearch);

$result = array();

foreach($plans as $planRef){
    array_push($result, array(
        'id' => $planRef->id,
        'name' => $planRef->name,
        'price' => $planRef->price,
        'detail' => $planRef->detail,
        'docsUrl' => $planRef->docsUrl,
    ));
}

echo json_encode($result);