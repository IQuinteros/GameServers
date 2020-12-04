<?php
/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once('base_api.php');
require_once __DIR__.('/../models/project.php');

class ProjectAPI extends BaseAPI {

    // Constructor
    public function __construct(){
        parent::__construct();
        $this->TABLE_NAME = 'project';
    }

    /**
     * Get project by id
     * @var int $id The id of the expected project
     */
    public function getProjectById(int $id){
        $this->open();

        $result = $this->query('SELECT * FROM '.$this->TABLE_NAME.' WHERE id=:id', array(
            new QueryParam(':id', $id),
        ));

        // Close connection
        $this->close();

        // Check if is found
        if($result->rowCount() > 0){

            // Check result
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                $foundProject = new Project(
                    $row->id,
                    $row->userID,
                    $row->name,
                    $row->planID,
                    $row->estimatedPlayers,
                    $row->teamQuantity,
                    $row->region,
                    $row->registerDate,
                    new ProjectStatus($row->status)
                );

                return $foundProject;
            }

        }
        else{
            // It isn't found so return false
            return false;
        }

    }

    /**
     * Search project by:
     * - User
     * - Projects
     * - Plans
     * @var string $toSearch The text to search in projects
     */
    public function getProjectsBySearch(string $toSearch){
        $this->open();

        $result = $this->query('SELECT project.* FROM '.$this->TABLE_NAME.
            ' JOIN users ON project.userID = users.id JOIN plan ON project.planID = plan.id '.
            'WHERE users.email LIKE :text OR users.name LIKE :text OR '.
            'plan.name LIKE :text '.
            'OR project.name LIKE :text OR project.region LIKE :text OR project.status LIKE :text', array(
            new QueryParam(':text', '%'.$toSearch.'%'),
        ));

        // Close connection
        $this->close();

        // Check if is found
        if($result->rowCount() > 0){

            $projects = array();

            // Check result
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                $foundProject = new Project(
                    $row->id,
                    $row->userID,
                    $row->name,
                    $row->planID,
                    $row->estimatedPlayers,
                    $row->teamQuantity,
                    $row->region,
                    $row->registerDate,
                    new ProjectStatus($row->status)
                );

                array_push($users, $foundProject);
            }

            return $projects;

        }
        else{
            // It isn't found so return false
            return array();
        }

    }

    /**
     * Add new project
     * 
     * @var Project $project Project data
     */
    public function addProject(Project $project){
        $this->open();

        $result = $this->query('INSERT INTO '.$this->TABLE_NAME.' VALUES ('.
            'NULL,:userID,:name,:planID,:image,:estimatedPlayers,:teamQuantity,:region,:registerDate,:status)', array(
                new QueryParam(':userID', $project->userID, PDO::PARAM_INT),
                new QueryParam(':name', $project->name),
                new QueryParam(':planID', $project->planID, PDO::PARAM_INT),
                new QueryParam(':image', $project->image),
                new QueryParam(':estimatedPlayers', $project->estimatedPlayers, PDO::PARAM_INT),
                new QueryParam(':teamQuantity', $project->teamQuantity, PDO::PARAM_INT),
                new QueryParam(':region', $project->region),
                new QueryParam(':registerDate', (date ("Y-m-d H:i:s"))),
                new QueryParam(':status', $project->status)
            ) 
        );

        $this->close();

        return $result;
    }

    /**
     * Update project data
     * 
     * @var Project $project New project data
     */
    public function updateProject(Project $project){
        $this->open();

        $result = $this->query('UPDATE '.$this->TABLE_NAME.' SET '.
            'userID=:userID,name=:name,planID=:planID,image=:image,estimatedPlayers=:estimatedPlayers,teamQuantity=:teamQuantity,region=:region,status=:status', array(
                new QueryParam(':userID', $project->userID, PDO::PARAM_INT),
                new QueryParam(':name', $project->name),
                new QueryParam(':planID', $project->planID, PDO::PARAM_INT),
                new QueryParam(':image', $project->image),
                new QueryParam(':estimatedPlayers', $project->estimatedPlayers, PDO::PARAM_INT),
                new QueryParam(':teamQuantity', $project->teamQuantity, PDO::PARAM_INT),
                new QueryParam(':region', $project->region),
                new QueryParam(':status', $project->status)
            )
        );

        $this->close();

        return $result;
    }

    /**
     * Delete project - Use carefully
     * 
     * @var Project $project Project to delete
     */
    public function deleteProject(Project $project){
        $this->open();

        $result = $this->query('DELETE FROM '.$this->TABLE_NAME.' WHERE id=:id', array(
                new QueryParam(':id', $project->id, PDO::PARAM_INT)
            )
        );

        $this->close();

        return $result;
    }

}
