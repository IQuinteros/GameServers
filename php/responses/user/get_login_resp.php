<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

/* This check if user is logged */


require_once __DIR__.('/../base_resp.php');
require_once __DIR__.('/../../utils/token.php');

$isToken = Token::checkToken();

$response = array(
    'isToken' => $isToken
);

echo json_encode($response);