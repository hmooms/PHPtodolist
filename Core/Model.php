<?php

class Model 
{
    protected $table;
    protected $primaryKey = 'id';
    protected $foreignKey;

    private $query = "";


    public function store($data)
    {
        // create connection
        $conn = $this->DBConnect();
        
        // check if table exists, if not create one.
        


    }

    public function update($data)
    {

    }

    public function delete($data)
    {
        
    }



    /* 
     * Gets all the data from this table
     * 
     */
    public function all($columns = ['*'])
    { 
        $this->query = "SELECT ";
        
        $this->selectColumns($columns);
                
        $this->query = $this->query . " FROM `" . $this->table . "`";
        return $this->get();
    }

    /*
     * Finds the ... with this id
     * 
     */
    public function find($id, $columns = ['*'])
    {
        $this->query = "SELECT ";
                
        $this->selectColumns($columns);
        
        $this->query = $this->query . " FROM `" . $this->table . "` WHERE `" . $this->primaryKey . "`=" . $id;
        return $this->get();
    }


    /*
     * $conditions expects column => condition
     *  
     * returns the object so you can do method chaining
     */
    public function where($conditions, $columns = ['*'])
    {
        $this->query = "SELECT ";

        $this->selectColumns($columns);
        
        $this->query = $this->query . " FROM `" . $this->table . "` WHERE ";
        
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
        // check if table exists if it doesnt exist return error

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


    private function selectColumns($columns)
    {
        $i = 0; // used to check last in for each loop
        $len = count($columns);

        foreach ($columns as $column)
        {
            $this->query = $this->query . $column;

            if (! $i == $len - 1) // not the last one in the loop
            {
                $this->query = $this->query . ", ";
            }
        }
    }
}