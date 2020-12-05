<?php
/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once('base_api.php');
require_once __DIR__.('/../models/feature.php');

class FeatureAPI extends BaseAPI {

    // Constructor
    public function __construct(){
        parent::__construct();
        $this->TABLE_NAME = 'feature';
    }

    /**
     * Get feature by id
     * @var int $id The id of the expected feature
     */
    public function getFeatureById(int $id){
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
                $foundFeature = new Feature(
                    $row->id,
                    $row->title,
                    $row->description,
                    $row->image,
                    $row->docsUrl
                );

                return $foundFeature;
            }

        }
        else{
            // It isn't found so return false
            return false;
        }

    }

    /**
     * Search feature by:
     * - Title
     * @var string $toSearch The text to search in features
     */
    public function getFeaturesBySearch(string $toSearch){
        $this->open();

        $result = $this->query('SELECT * FROM '.$this->TABLE_NAME.' WHERE title=:title', array(
            new QueryParam(':name', '%'.$toSearch.'%'),
        ));

        // Close connection
        $this->close();

        // Check if is found
        if($result->rowCount() > 0){

            $features = array();

            // Check result
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                $foundFeature = new Feature(
                    $row->id,
                    $row->title,
                    $row->description,
                    $row->image,
                    $row->docsUrl
                );

                array_push($features, $foundFeature);
            }

            return $features;

        }
        else{
            // It isn't found so return false
            return array();
        }

    }

    /**
     * Add new feature
     * 
     * @var Feature $feature Feature data
     */
    public function addPlan(Feature $feature){
        $this->open();

        $result = $this->query('INSERT INTO '.$this->TABLE_NAME.' VALUES ('.
            'NULL,:title,:description,:image,:docsUrl)', array(
                new QueryParam(':title', $feature->title),
                new QueryParam(':description', $feature->description, PDO::PARAM_INT),
                new QueryParam(':image', $feature->image),
                new QueryParam(':docsUrl', $feature->docsUrl)
            ) 
        );

        $this->close();

        return $result;
    }

    /**
     * Update feature data
     * 
     * @var Feature $feature New feature data
     */
    public function updateFeature(Feature $feature){
        $this->open();

        $result = $this->query('UPDATE '.$this->TABLE_NAME.' SET '.
            'title=:title,description=:description,image=:image,docsUrl=:docsUrl', array(
                new QueryParam(':title', $feature->title),
                new QueryParam(':description', $feature->description, PDO::PARAM_INT),
                new QueryParam(':image', $feature->image),
                new QueryParam(':docsUrl', $feature->docsUrl)
            )
        );

        $this->close();

        return $result;
    }

    /**
     * Delete feature - Use carefully
     * 
     * @var Feature $feature Feature to delete
     */
    public function deleteFeature(Feature $feature){
        $this->open();

        $result = $this->query('DELETE FROM '.$this->TABLE_NAME.' WHERE id=:id', array(
                new QueryParam(':id', $feature->id, PDO::PARAM_INT)
            )
        );

        $this->close();

        return $result;
    }

}
