<?php
/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once('base_api.php');
require_once __DIR__.('/../models/documentation_element.php');

class DocumentationElementAPI extends BaseAPI {

    // Constructor
    public function __construct(){
        parent::__construct();
        $this->TABLE_NAME = 'documentation_element';
    }

    /**
     * Get documentation element by id
     * @var int $id The id of the expected documentation element
     */
    public function getDocumentationElementById(int $id){
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
                $foundDocumentationElement = new DocumentationElement(
                    $row->id,
                    $row->parentID,
                    $row->title,
                    $row->publishDate,
                    $row->likes,
                    $row->dislikes,
                    $row->content
                );

                return $foundDocumentationElement;
            }

        }
        else{
            // It isn't found so return false
            return false;
        }

    }

    /**
     * Search documentation element by:
     * - Title
     * @var string $toSearch The text to search in documentation elements
     */
    public function getDocumentationElementsBySearch(string $toSearch){
        $this->open();

        $result = $this->query('SELECT * FROM '.$this->TABLE_NAME.' WHERE title LIKE :text', array(
            new QueryParam(':text', '%'.$toSearch.'%'),
        ));

        // Close connection
        $this->close();

        // Check if is found
        if($result->rowCount() > 0){

            $documentationElements = array();

            // Check result
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                $foundDocumentationElement = new DocumentationElement(
                    $row->id,
                    $row->parentID,
                    $row->title,
                    $row->publishDate,
                    $row->likes,
                    $row->dislikes,
                    $row->content
                );

                array_push($documentationElements, $foundDocumentationElement);
            }

            return $documentationElements;

        }
        else{
            // It isn't found so return false
            return array();
        }

    }

    /**
     * Add new documentation element
     * 
     * @var DocumentationElement $documentationElement Documentation element data
     */
    public function addDocumentationElement(DocumentationElement $documentationElement){
        $this->open();

        $result = $this->query('INSERT INTO '.$this->TABLE_NAME.' VALUES ('.
            'NULL,:parentID,:title,:publishDate,:likes,:dislikes,:content)', array(
                new QueryParam(':parentID', $documentationElement->parentID, PDO::PARAM_INT),
                new QueryParam(':title', $documentationElement->title),
                new QueryParam(':publishDate', (date ("Y-m-d H:i:s"))),
                new QueryParam(':likes', $documentationElement->likes, PDO::PARAM_INT),
                new QueryParam(':dislikes', $documentationElement->dislikes, PDO::PARAM_INT),
                new QueryParam(':content', $documentationElement->content)
            ) 
        );

        $this->close();

        return $result;
    }

    /**
     * Update documentation element data
     * 
     * @var DocumentationElement $documentationElement New documentationElement data
     */
    public function updateDocumentationElement(DocumentationElement $documentationElement){
        $this->open();

        $result = $this->query('UPDATE '.$this->TABLE_NAME.' SET '.
            'parentID=:parentID,title=:title,publishDate=:publishDate,likes=:likes,dislikes=:dislikes,content=:content', array(
                new QueryParam(':parentID', $documentationElement->parentID, PDO::PARAM_INT),
                new QueryParam(':title', $documentationElement->title),
                new QueryParam(':publishDate', $documentationElement->publishDate),
                new QueryParam(':likes', $documentationElement->likes, PDO::PARAM_INT),
                new QueryParam(':dislikes', $documentationElement->dislikes, PDO::PARAM_INT),
                new QueryParam(':content', $documentationElement->content)
            ) 
        );

        $this->close();

        return $result;
    }

    /**
     * Delete documentationElement - Use carefully
     * 
     * @var DocumentationElement $documentationElement DocumentationElement to delete
     */
    public function deleteDocumentationElement(DocumentationElement $documentationElement){
        $this->open();

        $result = $this->query('DELETE FROM '.$this->TABLE_NAME.' WHERE id=:id', array(
                new QueryParam(':id', $documentationElement->id, PDO::PARAM_INT)
            )
        );

        $this->close();

        return $result;
    }

}
