<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once __DIR__.('/../services/economy_element_api.php');
require_once __DIR__.('/../models/economy_element.php');

class EconomyElementRepository {

    /**
     * @var EconomyElementAPI
     */
    private static $economy_element_api;

    private static function init(){
        if(EconomyElementRepository::$economy_element_api == null){
            EconomyElementRepository::$economy_element_api = new EconomyElementAPI();
        }
    }

    public static function getEconomyElementById(int $id){
        EconomyElementRepository::init();
        return EconomyElementRepository::$economy_element_api->getEconomyElementById($id);
    }

    public static function getEconomyElementOfProjectById(int $projectID, int $id){
        EconomyElementRepository::init();
        return EconomyElementRepository::$economy_element_api->getEconomyElementOfProjectById($projectID, $id);
    }

    public static function getEconomyElementsBySearch(int $projectID, string $toSearch){
        EconomyElementRepository::init();
        return EconomyElementRepository::$economy_element_api->getEconomyElementsBySearch($projectID, $toSearch);
    }

    public static function addEconomyElement(EconomyElement $economyElement){
        EconomyElementRepository::init();
        return EconomyElementRepository::$economy_element_api->addEconomyElement($economyElement);
    }

    public static function updateEconomyElement(EconomyElement $economyElement){
        EconomyElementRepository::init();
        return EconomyElementRepository::$economy_element_api->updateEconomyElement($economyElement);
    }

    public static function deleteEconomyElement(EconomyElement $economyElement){
        EconomyElementRepository::init();
        return EconomyElementRepository::$economy_element_api->deleteEconomyElement($economyElement);
    }

    public static function deleteEconomyElements(array $items){
        EconomyElementRepository::init();
        return EconomyElementRepository::$economy_element_api->deleteEconomyElements($items);
    }

}