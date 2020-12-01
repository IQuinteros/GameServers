<?php
/*

	Author: Ignacio Quinteros Fuentes
	GitHub: https://github.com/iquinteros
	2020

*/

require_once  __DIR__.("/../config.php");

class QueryParam{
    /**
     * @var string $paramName The name param
     */
    public $paramName;
    
    /**
     * @var mixed $variable The value of the param
     */
    public $variable;

    /**
     * @var int $data_type
     */
    public $data_type = PDO::PARAM_STR;

    /**
     * @var int $length Length of data type
     */
    public $length = null; 

    public function __construct(string $paramName, $variable, int $data_type = PDO::PARAM_STR, int $length = null)
    {
        $this->paramName = $paramName;
        $this->variable = $variable;
        $this->data_type = $data_type;
        $this->length = $length;
    }

}

class BaseAPI{

    private const DSN = 'mysql:host='.DB_HOST.';port=3306;dbname='.DB_NAME;
    private const USERNAME = DB_USER;
    private const PASSWORD = DB_PASS;
    private const OPTIONS = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    );
    protected const TABLE_NAME = '';

    protected $pdo;

    // Constructor
    public function __construct(){

    }

    /**
     * Open connection with PDO - MySQL
     */
    public function open(){
        try{
            $this->pdo = new PDO(BaseAPI::DSN, BaseAPI::USERNAME, BaseAPI::PASSWORD, BaseAPI::OPTIONS);

            // Successful -> Return true
            return true;
        }
        catch(PDOException $e){
            return false;
        }
    }

    /**
     * Execute query with PDO
     * 
     * @param string $sql SQL Query to execute
     * @param array $queryParams QueryParams to bind in query
     */
    public function query(string $sql, array $queryParams){
        try{
            $statement = $this->pdo->prepare($sql);

            // Binds
            foreach($queryParams as $param){
                if($param instanceof QueryParam){
                    $statement->bindParam($param->paramName, $param->variable, $param->data_type, $param->length);
                }
                else{
                    throw new \InvalidArgumentException('Value must be a QueryParam');
                    return false;
                }
            }

            $statement->execute();

            return $statement;
        }
        catch(Exception $e){
            return false;
        }
    }

    /**
     * Close connection with MySql using PDO
     */
    public function close(){
        $this->pdo = null;
    }

    public function getPDO(){
        return $this->pdo;
    }
}