<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once __DIR__.('/../base_resp.php');
require_once __DIR__.('/../../utils/login.php');
require_once __DIR__.('/../../repositories/plan_repository.php');

// Check data
if (checkRequestData(array('id', 'name', 'description', 'price'))){

    // Check current admin
    $currentAdmin = Login::getCurrentAdmin();

    if($currentAdmin == null){ returnError('Administrador actual no válido'); }


    // Update plan

    $planRef = new Plan(
        (int)$_REQUEST['id'],
        $_REQUEST['name'],
        (float)$_REQUEST['price'],
        $_REQUEST['description'],
        ''
    );

    $addResult = PlanRepository::updatePlan($planRef);

    $result = array('PDO'=>$addResult->errorInfo());

}
else{
    $result = formatError('Faltan datos para actualizar los datos del plan');
}

echo json_encode($result);