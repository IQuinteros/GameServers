<?php
/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once('base_api.php');
require_once __DIR__.('/../models/feature_content.php');

class FeatureContentAPI extends BaseAPI {

    // Constructor
    public function __construct(){
        parent::__construct();
        $this->TABLE_NAME = 'feature_content';
    }

    /**
     * Get feature content by id
     * @var int $id The id of the expected feature content
     */
    public function getFeatureContentById(int $id){
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
                $foundFeatureContent = new FeatureContent(
                    $row->id,
                    $row->featureID,
                    $row->image,
                    $row->title,
                    $row->content,
                    $row->docsUrl
                );

                return $foundFeatureContent;
            }

        }
        else{
            // It isn't found so return false
            return false;
        }

    }

    /**
     * Search feature content by:
     * - Feature ID
     * @var int $featureID The text to search in features
     */
    public function getFeatureContentsByFeature(int $featureID){
        $this->open();

        $result = $this->query('SELECT * FROM '.$this->TABLE_NAME.' WHERE featureID=:featureID', array(
            new QueryParam(':featureID', '%'.$featureID.'%'),
        ));

        // Close connection
        $this->close();

        // Check if is found
        if($result->rowCount() > 0){

            $featureContents = array();

            // Check result
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                $foundFeatureContent = new FeatureContent(
                    $row->id,
                    $row->featureID,
                    $row->image,
                    $row->title,
                    $row->content,
                    $row->docsUrl
                );

                array_push($featureContents, $foundFeatureContent);
            }

            return $featureContents;

        }
        else{
            // It isn't found so return false
            return array();
        }

    }

    /**
     * Add new feature content
     * 
     * @var FeatureContent $featureContent Feature content data
     */
    public function addFeatureContent(Feature $featureContent){
        $this->open();

        $result = $this->query('INSERT INTO '.$this->TABLE_NAME.' VALUES ('.
            'NULL,:featureID,:image,:title,:content,:docsUrl)', array(
                new QueryParam(':featureID', $featureContent->featureID, PDO::PARAM_INT),
                new QueryParam(':image', $featureContent->image),
                new QueryParam(':title', $featureContent->title),
                new QueryParam(':content', $featureContent->content),
                new QueryParam(':docsUrl', $featureContent->docsUrl)
            ) 
        );

        $this->close();

        return $result;
    }

    /**
     * Update featureContent data
     * 
     * @var FeatureContent $featureContent New featureContent data
     */
    public function updateFeatureContent(Feature $featureContent){
        $this->open();

        $result = $this->query('UPDATE '.$this->TABLE_NAME.' SET '.
            'featureID=:featureID,image=:image,title=:title,content=:content,docsUrl=:docsUrl', array(
                new QueryParam(':featureID', $featureContent->featureID, PDO::PARAM_INT),
                new QueryParam(':image', $featureContent->image),
                new QueryParam(':title', $featureContent->title),
                new QueryParam(':content', $featureContent->content),
                new QueryParam(':docsUrl', $featureContent->docsUrl)
            ) 
        );

        $this->close();

        return $result;
    }

    /**
     * Delete featureContent - Use carefully
     * 
     * @var FeatureContent $featureContent FeatureContent to delete
     */
    public function deleteFeatureContent(FeatureContent $featureContent){
        $this->open();

        $result = $this->query('DELETE FROM '.$this->TABLE_NAME.' WHERE id=:id', array(
                new QueryParam(':id', $featureContent->id, PDO::PARAM_INT)
            )
        );

        $this->close();

        return $result;
    }

}
