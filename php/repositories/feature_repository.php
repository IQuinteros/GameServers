<?php

require_once __DIR__.('/../services/feature_api.php');
require_once __DIR__.('/../models/feature.php');

class FeatureRepository {

    /**
     * @var FeatureAPI
     */
    private static $feature_api;

    private static function init(){
        if(FeatureRepository::$feature_api == null){
            FeatureRepository::$feature_api = new FeatureAPI();
        }
    }

    public static function getFeatureById(int $id){
        FeatureRepository::init();
        return FeatureRepository::$feature_api->getFeatureById($id);
    }

    public static function getFeaturesBySearch(string $toSearch){
        FeatureRepository::init();
        return FeatureRepository::$feature_api->getFeaturesBySearch($toSearch);
    }

    public static function addFeature(Feature $feature){
        FeatureRepository::init();
        return FeatureRepository::$feature_api->addFeature($feature);
    }

    public static function updateFeature(Feature $feature){
        FeatureRepository::init();
        return FeatureRepository::$feature_api->updateFeature($feature);
    }

    public static function deleteFeature(Feature $feature){
        FeatureRepository::init();
        return FeatureRepository::$feature_api->deleteFeature($feature);
    }

}