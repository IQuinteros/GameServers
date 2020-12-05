<?php

require_once __DIR__.('/../services/plan_api.php');
require_once __DIR__.('/../models/plan.php');

class PlanRepository {

    /**
     * @var PlanAPI
     */
    private static $plan_api;

    private static function init(){
        if(PlanRepository::$plan_api == null){
            PlanRepository::$plan_api = new PlanAPI();
        }
    }

    public static function getPlanById(int $id){
        PlanRepository::init();
        return PlanRepository::$plan_api->getPlanById($id);
    }

    public static function getPlansBySearch(string $toSearch){
        PlanRepository::init();
        return PlanRepository::$plan_api->getPlansBySearch($toSearch);
    }

    public static function addPlan(Plan $plan){
        PlanRepository::init();
        return PlanRepository::$plan_api->addPlan($plan);
    }

    public static function updatePlan(Plan $plan){
        PlanRepository::init();
        return PlanRepository::$plan_api->updatePlan($plan);
    }

    public static function deletePlan(Plan $plan){
        PlanRepository::init();
        return PlanRepository::$plan_api->deletePlan($plan);
    }

}