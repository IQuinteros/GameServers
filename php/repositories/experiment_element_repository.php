<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once __DIR__.('/../services/experiment_element_api.php');
require_once __DIR__.('/../models/experiment_element.php');

class ExperimentElementRepository {

    /**
     * @var ExperimentElementAPI
     */
    private static $experiment_element_api;

    private static function init(){
        if(ExperimentElementRepository::$experiment_element_api == null){
            ExperimentElementRepository::$experiment_element_api = new ExperimentElementAPI();
        }
    }

    public static function getExperimentElementById(int $id){
        ExperimentElementRepository::init();
        return ExperimentElementRepository::$experiment_element_api->getExperimentElementById($id);
    }

    public static function getExperimentElementOfProjectById(int $projectID, int $id){
        ExperimentElementRepository::init();
        return ExperimentElementRepository::$experiment_element_api->getExperimentElementOfProjectById($projectID, $id);
    }

    public static function getExperimentElementsBySearch(int $projectID, string $toSearch){
        ExperimentElementRepository::init();
        return ExperimentElementRepository::$experiment_element_api->getExperimentElementsBySearch($projectID, $toSearch);
    }

    public static function addExperimentElement(ExperimentElement $experimentElement){
        ExperimentElementRepository::init();
        return ExperimentElementRepository::$experiment_element_api->addExperimentElement($experimentElement);
    }

    public static function updateExperimentElement(ExperimentElement $experimentElement){
        ExperimentElementRepository::init();
        return ExperimentElementRepository::$experiment_element_api->updateExperimentElement($experimentElement);
    }

    public static function deleteExperimentElement(ExperimentElement $experimentElement){
        ExperimentElementRepository::init();
        return ExperimentElementRepository::$experiment_element_api->deleteExperimentElement($experimentElement);
    }

    public static function deleteExperimentElements(array $items){
        ExperimentElementRepository::init();
        return ExperimentElementRepository::$experiment_element_api->deleteExperimentElements($items);
    }

}