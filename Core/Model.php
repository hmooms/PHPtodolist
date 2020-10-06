<?php

namespace Core;

use PDO;

class Model 
{
    protected $table;
    protected $primaryKey = 'id';
    protected $foreignKey;

    private $query = "";


    /*
     * $data expects array with named keys
     */
    public function store($data)
    {
        $this->query = "INSERT INTO `" . $this->table . "` (";

        $i = 0; // used to check last in for each loop
        $len = count($data);

        foreach ($data as $column => $value)
        {
            $this->query = $this->query . $column;

            if ($i < $len - 1)
            {
                $this->query = $this->query . ", ";
                $i++;
            }
        }

        $this->query = $this->query . ") VALUES (";
       
        $j = 0;
        
        foreach ($data as $column => $value)
        {
            $this->query = $this->query . ":" . $column;

            if ($j < $len - 1)
            {
                $this->query = $this->query . ", ";
                $j++; 
            }
             
        }

        $this->query = $this->query . ")";

        $this->set($data);
    }

    public function update($data, $id)
    {
        $this->query = "UPDATE `" . $this->table . "` SET ";

        $i = 0;
        $len = count($data);

        foreach ($data as $column => $value)
        {
            $this->query = $this->query . $column . "=:" . $column;

            if ($i < $len - 1)
            {
                $this->query = $this->query . ", ";
                $i++;
            }
        }

        $this->query = $this->query . " WHERE " . $this->primaryKey . "=" . $id;

        $this->set($data);
    }

    public function delete($data)
    {
        $this->query = "DELETE FROM `" . $this->table . "` WHERE " . $this->primaryKey . "=:id";
        
        $this->set($data);
    }

    private function set($data)
    {
        $conn = $this->DBConnect();
        // var_dump($id, $this->query, $data);

        $conn->prepare($this->query)->execute($data);
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

            if ($i < $len - 1) // not the last one in the loop
            {
                $this->query = $this->query . " AND ";
                $i++;
            }
        }
        
        return $this;
    }
    
    /*
     * execute the query more or less 
     */
    public function get()
    {
        // create connection
        $conn = $this->DBConnect();

        $stmt = $conn->prepare($this->query);
        // get execute them!
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // return data;
        

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

            if ($i < $len - 1) // not the last one in the loop
            {
                $this->query = $this->query . ", ";
                $i++;
            }
        }
    }
}