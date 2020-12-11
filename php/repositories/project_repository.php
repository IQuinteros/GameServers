<?php

/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once __DIR__.('/../services/project_api.php');
require_once __DIR__.('/../models/project.php');

class ProjectRepository {

    /**
     * @var ProjectAPI
     */
    private static $project_api;

    private static function init(){
        if(ProjectRepository::$project_api == null){
            ProjectRepository::$project_api = new ProjectAPI();
        }
    }

    public static function getProjectById(int $id){
        ProjectRepository::init();
        return ProjectRepository::$project_api->getProjectById($id);
    }

    public static function getProjectsByUserId(int $userId){
        ProjectRepository::init();
        return ProjectRepository::$project_api->getProjectsByUserId($userId);
    }

    public static function getProjectsBySearch(string $toSearch){
        ProjectRepository::init();
        return ProjectRepository::$project_api->getProjectsBySearch($toSearch);
    }

    public static function addProject(Project $project){
        ProjectRepository::init();
        return ProjectRepository::$project_api->addProject($project);
    }

    public static function updateProject(Project $project){
        ProjectRepository::init();
        return ProjectRepository::$project_api->updateProject($project);
    }

    public static function updateStatus(array $projects, ProjectStatus $newStatus){
        ProjectRepository::init();
        return ProjectRepository::$project_api->updateStatus($projects, $newStatus);
    }

    public static function deleteProject(Project $project){
        ProjectRepository::init();
        return ProjectRepository::$project_api->deleteProject($project);
    }

}