<?php
/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once('base_api.php');
require_once __DIR__.('/../models/economy_element.php');

class EconomyElementAPI extends BaseAPI {

    // Constructor
    public function __construct(){
        parent::__construct();
        $this->TABLE_NAME = 'economy_element';
    }

    /**
     * Get economy element by id
     * @var int $id The id of the expected economy element
     */
    public function getEconomyElementById(int $id){
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
                $foundEconomyElement = new EconomyElement(
                    $row->id,
                    $row->projectID,
                    $row->name,
                    $row->initialQuantity,
                    $row->maxQuantity
                );

                return $foundEconomyElement;
            }

        }
        else{
            // It isn't found so return false
            return false;
        }

    }

    /**
     * Get economy element by id
     * @var int $projectID The project if of the expected economy element
     * @var int $id The id of the expected economy element
     */
    public function getEconomyElementOfProjectById(int $projectID, int $id){
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
                $foundEconomyElement = new EconomyElement(
                    $row->id,
                    $row->projectID,
                    $row->name,
                    $row->initialQuantity,
                    $row->maxQuantity
                );

                return $foundEconomyElement;
            }

        }
        else{
            // It isn't found so return false
            return false;
        }

    }

    /**
     * Search economy element by:
     * - Name
     * @var int $projectID The project id of elements
     * @var string $toSearch The text to search in economy elements
     */
    public function getEconomyElementsBySearch(int $projectID, string $toSearch){
        $this->open();

        $result = $this->query('SELECT * FROM '.$this->TABLE_NAME.' WHERE name LIKE :text AND projectID = :projectID', array(
            new QueryParam(':text', '%'.$toSearch.'%'),
            new QueryParam(':projectID', $projectID, PDO::PARAM_INT)
        ));

        // Close connection
        $this->close();

        // Check if is found
        if($result->rowCount() > 0){

            $economyElements = array();

            // Check result
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                $foundEconomyElement = new EconomyElement(
                    $row->id,
                    $row->projectID,
                    $row->name,
                    $row->initialQuantity,
                    $row->maxQuantity
                );

                array_push($economyElements, $foundEconomyElement);
            }

            return $economyElements;

        }
        else{
            // It isn't found so return false
            return array();
        }

    }

    /**
     * Add new economy element
     * 
     * @var EconomyElement $economyElement Economy element data
     */
    public function addEconomyElement(EconomyElement $economyElement){
        $this->open();

        $result = $this->query('INSERT INTO '.$this->TABLE_NAME.' VALUES ('.
            'NULL,:projectID,:name,:initialQuantity,:maxQuantity)', array(
                new QueryParam(':projectID', $economyElement->projectID, PDO::PARAM_INT),
                new QueryParam(':name', $economyElement->name),
                new QueryParam(':initialQuantity', $economyElement->initialQuantity, PDO::PARAM_INT),
                new QueryParam(':maxQuantity', $economyElement->maxQuantity, PDO::PARAM_INT)
            ) 
        );

        $this->close();

        return $result;
    }

    /**
     * Update economy element data
     * 
     * @var EconomyElement $economyElement New economyElement data
     */
    public function updateEconomyElement(EconomyElement $economyElement){
        $this->open();

        $result = $this->query('UPDATE '.$this->TABLE_NAME.' SET '.
            'projectID=:projectID,name=:name,initialQuantity=:initialQuantity,maxQuantity=:maxQuantity WHERE id=:id', array(
                new QueryParam(':id', $economyElement->id, PDO::PARAM_INT),
                new QueryParam(':projectID', $economyElement->projectID, PDO::PARAM_INT),
                new QueryParam(':name', $economyElement->name),
                new QueryParam(':initialQuantity', $economyElement->initialQuantity, PDO::PARAM_INT),
                new QueryParam(':maxQuantity', $economyElement->maxQuantity, PDO::PARAM_INT)
            ) 
        );

        $this->close();

        return $result;
    }

    /**
     * Delete economyElement - Use carefully
     * 
     * @var EconomyElement $economyElement EconomyElement to delete
     */
    public function deleteEconomyElement(EconomyElement $economyElement){
        $this->open();

        $result = $this->query('DELETE FROM '.$this->TABLE_NAME.' WHERE id=:id', array(
                new QueryParam(':id', $economyElement->id, PDO::PARAM_INT)
            )
        );

        $this->close();

        return $result;
    }

    /**
     * Delete some economy elements - Use carefully
     * 
     * @var array $items IDs of economy elements
     */
    public function deleteEconomyElements(array $items){
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
