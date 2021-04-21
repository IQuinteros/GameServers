<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once __DIR__.('/../services/documentation_element_api.php');
require_once __DIR__.('/../models/documentation_element.php');

class DocumentationElementRepository {

    /**
     * @var DocumentationElementAPI
     */
    private static $documentation_element_api;

    private static function init(){
        if(DocumentationElementRepository::$documentation_element_api == null){
            DocumentationElementRepository::$documentation_element_api = new DocumentationElementAPI();
        }
    }

    public static function getDocumentationElementById(int $id){
        DocumentationElementRepository::init();
        return DocumentationElementRepository::$documentation_element_api->getDocumentationElementById($id);
    }

    public static function getDocumentationElementsBySearch(string $toSearch){
        DocumentationElementRepository::init();
        return DocumentationElementRepository::$documentation_element_api->getDocumentationElementsBySearch($toSearch);
    }

    public static function getOrderDocs(){
        $docs = DocumentationElementRepository::getDocumentationElementsBySearch('');

        $result = array();

        foreach($docs as $docRef){
            if($docRef->parentID != null){      
                
                array_push($result[$docRef->parentID]['children'], array(
                    'id' => $docRef->id,
                    'parentID' => $docRef->parentID,
                    'title' => $docRef->title,
                    'publishDate' => $docRef->publishDate,
                    'likes' => $docRef->likes,
                    'dislikes' => $docRef->dislikes,
                    'content' => $docRef->content
                ));

            }
            else{
                $result[$docRef->id] = array(
                    'id' => $docRef->id,
                    'parentID' => $docRef->parentID,
                    'title' => $docRef->title,
                    'publishDate' => $docRef->publishDate,
                    'likes' => $docRef->likes,
                    'dislikes' => $docRef->dislikes,
                    'content' => $docRef->content,
                    'children' => array()
                );
            }
        }

        return $result;
    }

    public static function addDocumentationElement(DocumentationElement $documentationElement){
        DocumentationElementRepository::init();
        return DocumentationElementRepository::$documentation_element_api->addDocumentationElement($documentationElement);
    }

    public static function updateDocumentationElement(DocumentationElement $documentationElement){
        DocumentationElementRepository::init();
        return DocumentationElementRepository::$documentation_element_api->updateDocumentationElement($documentationElement);
    }

    public static function updateDocRate(DocumentationElement $documentationElement, bool $isLike = true){
        DocumentationElementRepository::init();
        return DocumentationElementRepository::$documentation_element_api->updateDocRate($documentationElement, $isLike);
    }

    public static function deleteDocumentationElement(DocumentationElement $documentationElement){
        DocumentationElementRepository::init();
        return DocumentationElementRepository::$documentation_element_api->deleteDocumentationElement($documentationElement);
    }

}