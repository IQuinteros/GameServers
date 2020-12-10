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
     * Search economy element by:
     * - Name
     * @var string $toSearch The text to search in economy elements
     */
    public function getEconomyElementsBySearch(int $projectID, string $toSearch){
        $this->open();

        $result = $this->query('SELECT * FROM '.$this->TABLE_NAME.' WHERE name LIKE :text AND projectID = :projectID', array(
            new QueryParam(':text', '%'.$toSearch.'%'),
            new QueryParam(':projectID', $projectID, PDO::PARAM_INT),
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
                new QueryParam(':initialQuantity', $economyElement->description, PDO::PARAM_INT),
                new QueryParam(':maxQuantity', $economyElement->description, PDO::PARAM_INT)
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
            'projectID=:projectID,name=:name,initialQuantity=:initialQuantity,maxQuantity=:maxQuantity', array(
                new QueryParam(':projectID', $economyElement->projectID, PDO::PARAM_INT),
                new QueryParam(':name', $economyElement->name),
                new QueryParam(':initialQuantity', $economyElement->description, PDO::PARAM_INT),
                new QueryParam(':maxQuantity', $economyElement->description, PDO::PARAM_INT)
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

}
