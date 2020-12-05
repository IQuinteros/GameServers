<?php

require_once __DIR__.('/../services/feature_content_api.php');
require_once __DIR__.('/../models/feature_content.php');

class FeatureContentRepository {

    /**
     * @var FeatureContentAPI
     */
    private static $feature_content_api;

    private static function init(){
        if(FeatureContentRepository::$feature_content_api == null){
            FeatureContentRepository::$feature_content_api = new FeatureContenAPI();
        }
    }

    public static function getFeatureContentById(int $id){
        FeatureContentRepository::init();
        return FeatureContentRepository::$feature_content_api->getFeatureContentById($id);
    }

    public static function getFeatureContentsByFeature(int $featureID){
        FeatureContentRepository::init();
        return FeatureContentRepository::$feature_content_api->getFeatureContentsByFeature($toSearch);
    }

    public static function addFeatureContent(FeatureContent $featureContent){
        FeatureContentRepository::init();
        return FeatureContentRepository::$feature_content_api->addFeatureContent($featureContent);
    }

    public static function updateFeatureContent(FeatureContent $featureContent){
        FeatureContentRepository::init();
        return FeatureContentRepository::$feature_content_api->updateFeatureContent($featureContent);
    }

    public static function deleteFeatureContent(FeatureContent $featureContent){
        FeatureContentRepository::init();
        return FeatureContentRepository::$feature_content_api->deleteFeatureContent($featureContent);
    }

}