<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once __DIR__.('/../base_resp.php');
require_once __DIR__.('/../../utils/login.php');
require_once __DIR__.('/../../repositories/documentation_element_repository.php');

if(!checkRequestData(array('id'))){ returnError('No hay suficientes datos para devolver un documento'); return; }

$doc = DocumentationElementRepository::getDocumentationElementById((int)$_REQUEST['id']);

if($doc != null || $doc != false){
    $result = array(
        'id' => $doc->id,
        'parentID' => $doc->parentID,
        'title' => $doc->title,
        'publishDate' => $doc->publishDate,
        'likes' => $doc->likes,
        'dislikes' => $doc->dislikes,
        'content' => $doc->content
    );
}
else{
    $result = formatError('No se ha encontrado el documento');
}

echo json_encode($result);