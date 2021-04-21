<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once('base_resp.php');
require_once __DIR__.('/../config.php');

$routes = array(
    'ROUTE_INDEX' => ROUTE_INDEX,
    'ROUTE_ADMIN' => ROUTE_ADMIN,
    'ROUTE_FEATURES' => ROUTE_FEATURES,
    'ROUTE_PRICING' => ROUTE_PRICING,
    'ROUTE_DOCS' => ROUTE_DOCS,
    'ROUTE_REGISTER' => ROUTE_REGISTER,
    'ROUTE_LOGIN' => ROUTE_LOGIN,
    'ROUTE_PROFILE' => ROUTE_PROFILE,
    'ROUTE_PROJECT' => ROUTE_PROJECT,
);

echo json_encode($routes);