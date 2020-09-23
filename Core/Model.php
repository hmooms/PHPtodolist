<?php

class Model
{
    protected $table;
    protected $primaryKey = 'id';
    protected $foreignKey;


    private $where;
    private $usedMethods = array();
    private $query = "";

    /* 
     * Gets all the data from this table
     * columns array not yet implemented
     */
    public function all($columns = ['*'])
    { 
        $this->query = "SELECT * FROM `" . $this->table . "`";
        $this->get();
    }

    /*
     * Finds the ... with this id
     * columns array not yet implemented 
     */
    public function find($id, $columns = ['*'])
    {
        $this->query = "SELECT * FROM `" . $this->table . "` WHERE `" . $this->primaryKey . "`=" . $id;
        return $this->get();
    }


    /*
     * $conditions expects column => condition
     * columns array not yet implemented 
     * returns the object so you can do method chaining
     */
    public function where($conditions, $columns = ['*'])
    {
        $this->query = "SELECT * FROM `" . $this->table . "` WHERE ";
        
        $i = 0; // used to check last in for each loop
        $len = count($conditions);

        foreach ($conditions as $column => $condition)
        {
            $this->query = $this->query . " `" . $column . "`=" . $condition;

            if (! $i == $len - 1) // not the last one in the loop
            {
                $this->query = $this->query . " AND ";
            }
        }
        
        return $this;
    }

    public function orderBy()
    {

        return $this;
    }

    
    /*
     * execute the query more or less 
     */
    public function get()
    {
        // create connection
        $conn = $this->DBConnect();
        // create query
        $stmt = $conn->prepare($this->query);
        // get data
        $stmt->execute();
        // close connection 
        
        // $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this));

        $result = $stmt->fetchAll();
        // return data;
        
        var_dump($result);
        
        echo $this->query . ' <br>';

        return $result;
    }

    /*
     * create a database connection
     */
    private function DBConnect()
    {
        // create connection with constants defined in config
        return new PDO( DB_TYPE . ': host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS );
    } 
}