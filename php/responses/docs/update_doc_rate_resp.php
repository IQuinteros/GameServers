<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once __DIR__.('/../base_resp.php');
require_once __DIR__.('/../../utils/login.php');
require_once __DIR__.('/../../repositories/documentation_element_repository.php');

if(!checkRequestData(array('id', 'rate'))){ returnError('No hay suficientes datos para devolver un documento'); return; }

$doc = DocumentationElementRepository::getDocumentationElementById((int)$_REQUEST['id']);

if($doc != null || $doc != false){
    $result = DocumentationElementRepository::updateDocRate($doc, $_REQUEST['rate'] != 'false');
}
else{
    $result = formatError('No se ha encontrado el documento');
}

echo json_encode($result);