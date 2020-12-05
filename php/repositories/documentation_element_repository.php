<?php

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

    public static function addDocumentationElement(DocumentationElement $documentationElement){
        DocumentationElementRepository::init();
        return DocumentationElementRepository::$documentation_element_api->addDocumentationElement($documentationElement);
    }

    public static function updateDocumentationElement(DocumentationElement $documentationElement){
        DocumentationElementRepository::init();
        return DocumentationElementRepository::$documentation_element_api->updateDocumentationElement($documentationElement);
    }

    public static function deleteDocumentationElement(DocumentationElement $documentationElement){
        DocumentationElementRepository::init();
        return DocumentationElementRepository::$documentation_element_api->deleteDocumentationElement($documentationElement);
    }

}