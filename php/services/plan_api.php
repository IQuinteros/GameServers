<?php
/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once('base_api.php');
require_once __DIR__.('/../models/plan.php');

class PlanAPI extends BaseAPI {

    // Constructor
    public function __construct(){
        parent::__construct();
        $this->TABLE_NAME = 'plan';
    }

    /**
     * Get plan by id
     * @var int $id The id of the expected plan
     */
    public function getPlanById(int $id){
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
                $foundPlan = new Plan(
                    $row->id,
                    $row->name,
                    $row->price,
                    $row->detail,
                    $row->docsUrl
                );

                return $foundPlan;
            }

        }
        else{
            // It isn't found so return false
            return false;
        }

    }

    /**
     * Search plan by:
     * - Name
     * @var string $toSearch The text to search in plans
     */
    public function getPlansBySearch(string $toSearch){
        $this->open();

        $result = $this->query('SELECT * FROM '.$this->TABLE_NAME.' WHERE name=:name', array(
            new QueryParam(':name', '%'.$toSearch.'%'),
        ));

        // Close connection
        $this->close();

        // Check if is found
        if($result->rowCount() > 0){

            $plans = array();

            // Check result
            while($row = $result->fetch(PDO::FETCH_OBJ)){
                $foundPlan = new Plan(
                    $row->id,
                    $row->name,
                    $row->price,
                    $row->detail,
                    $row->docsUrl
                );

                array_push($plans, $foundPlan);
            }

            return $plans;

        }
        else{
            // It isn't found so return false
            return array();
        }

    }

    /**
     * Add new plan
     * 
     * @var Plan $plan Plan data
     */
    public function addPlan(Plan $plan){
        $this->open();

        $result = $this->query('INSERT INTO '.$this->TABLE_NAME.' VALUES ('.
            'NULL,:name,:price,:detail,:docsUrl)', array(
                new QueryParam(':name', $plan->name),
                new QueryParam(':price', $plan->price, PDO::PARAM_INT),
                new QueryParam(':detail', $plan->detail),
                new QueryParam(':docsUrl', $plan->docsUrl)
            ) 
        );

        $this->close();

        return $result;
    }

    /**
     * Update plan data
     * 
     * @var Plan $plan New plan data
     */
    public function updatePlan(Plan $plan){
        $this->open();

        $result = $this->query('UPDATE '.$this->TABLE_NAME.' SET '.
            'name=:name,price=:price,detail=:detail,docsUrl=:docsUrl', array(
                new QueryParam(':name', $plan->name),
                new QueryParam(':price', $plan->price, PDO::PARAM_INT),
                new QueryParam(':detail', $plan->detail),
                new QueryParam(':docsUrl', $plan->docsUrl)
            )
        );

        $this->close();

        return $result;
    }

    /**
     * Delete plan - Use carefully
     * 
     * @var Plan $plan Plan to delete
     */
    public function deletePlan(Plan $plan){
        $this->open();

        $result = $this->query('DELETE FROM '.$this->TABLE_NAME.' WHERE id=:id', array(
                new QueryParam(':id', $plan->id, PDO::PARAM_INT)
            )
        );

        $this->close();

        return $result;
    }

}
