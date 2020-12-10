<?php
/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once('base_api.php');
require_once __DIR__.('/../models/experiment_element.php');

class ExperimentElementAPI extends BaseAPI {

    // Constructor
    public function __construct(){
        parent::__construct();
        $this->TABLE_NAME = 'experiment_element';
    }

    /**
     * Get experiment element by id
     * @var int $id The id of the expected experiment element
     */
    public function getExperimentElementById(int $id){
        $this->open();

        $result = $this->query('SELECT * FROM '.$this->TABLE_NAME.' WHERE id=:id', array(
            new QueryParam(':id', $id, PDO::PARAM_INT)
        ));

        // Close connection
        $this->close();

        // Check if is found
        if($result->rowCount() > 0){

            // Check result
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                $foundExperimentElement = new ExperimentElement(
                    $row->id,
                    $row->projectID,
                    $row->name,
                    $row->description
                );

                return $foundExperimentElement;
            }

        }
        else{
            // It isn't found so return false
            return false;
        }

    }

    /**
     * Get experiment element by id
     * @var int $projectID The project if of the expected experiment element
     * @var int $id The id of the expected experiment element
     */
    public function getExperimentElementOfProjectById(int $projectID, int $id){
        $this->open();

        $result = $this->query('SELECT * FROM '.$this->TABLE_NAME.' WHERE id=:id AND projectID=:projectID', array(
            new QueryParam(':id', $id, PDO::PARAM_INT),
            new QueryParam(':projectID', $projectID, PDO::PARAM_INT)
        ));

        // Close connection
        $this->close();

        // Check if is found
        if($result->rowCount() > 0){

            // Check result
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                $foundExperimentElement = new ExperimentElement(
                    $row->id,
                    $row->projectID,
                    $row->name,
                    $row->description
                );

                return $foundExperimentElement;
            }

        }
        else{
            // It isn't found so return false
            return false;
        }

    }

    /**
     * Search experiment element by:
     * - Name
     * @var int $projectID The project id of elements
     * @var string $toSearch The text to search in experiment elements
     */
    public function getExperimentElementsBySearch(int $projectID, string $toSearch){
        $this->open();

        $result = $this->query('SELECT * FROM '.$this->TABLE_NAME.' WHERE name LIKE :text AND projectID = :projectID', array(
            new QueryParam(':text', '%'.$toSearch.'%'),
            new QueryParam(':projectID', $projectID, PDO::PARAM_INT)
        ));

        // Close connection
        $this->close();

        // Check if is found
        if($result->rowCount() > 0){

            $experimentElements = array();

            // Check result
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                $foundExperimentElement = new ExperimentElement(
                    $row->id,
                    $row->projectID,
                    $row->name,
                    $row->description
                );

                array_push($experimentElements, $foundExperimentElement);
            }

            return $experimentElements;

        }
        else{
            // It isn't found so return false
            return array();
        }

    }

    /**
     * Add new experiment element
     * 
     * @var ExperimentElement $experimentElement Experiment element data
     */
    public function addExperimentElement(ExperimentElement $experimentElement){
        $this->open();

        $result = $this->query('INSERT INTO '.$this->TABLE_NAME.' VALUES ('.
            'NULL,:projectID,:name,:description)', array(
                new QueryParam(':projectID', $experimentElement->projectID, PDO::PARAM_INT),
                new QueryParam(':name', $experimentElement->name),
                new QueryParam(':description', $experimentElement->description)
            ) 
        );

        $this->close();

        return $result;
    }

    /**
     * Update experiment element data
     * 
     * @var ExperimentElement $experimentElement New experimentElement data
     */
    public function updateExperimentElement(ExperimentElement $experimentElement){
        $this->open();

        $result = $this->query('UPDATE '.$this->TABLE_NAME.' SET '.
            'projectID=:projectID,name=:name,description=:description WHERE id=:id', array(
                new QueryParam(':id', $experimentElement->id, PDO::PARAM_INT),
                new QueryParam(':projectID', $experimentElement->projectID, PDO::PARAM_INT),
                new QueryParam(':name', $experimentElement->name),
                new QueryParam(':description', $experimentElement->description)
            ) 
        );

        $this->close();

        return $result;
    }

    /**
     * Delete experimentElement - Use carefully
     * 
     * @var ExperimentElement $experimentElement ExperimentElement to delete
     */
    public function deleteExperimentElement(ExperimentElement $experimentElement){
        $this->open();

        $result = $this->query('DELETE FROM '.$this->TABLE_NAME.' WHERE id=:id', array(
                new QueryParam(':id', $experimentElement->id, PDO::PARAM_INT)
            )
        );

        $this->close();

        return $result;
    }

    /**
     * Delete some experiment elements - Use carefully
     * 
     * @var array $items IDs of experiment elements
     */
    public function deleteExperimentElements(array $items){
        if(count($items) <= 0){ return false; }

        $sql = 'DELETE FROM '.$this->TABLE_NAME.' WHERE ';
        $queryParams = array();

        for($i = 0; $i < count($items); $i++){

            $sql = $sql.'id=:id'.$i;
            // If is last or not
            if(!($i >= count($items) - 1)){
                $sql = $sql.' OR ';
            }

            array_push($queryParams, new QueryParam(':id'.$i, $items[$i], PDO::PARAM_INT));

        }

        $this->open();

        $result = $this->query($sql, $queryParams);

        $this->close();

        return $result;
    }

}
