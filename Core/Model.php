<?php

namespace Core;

use PDO;

class Model 
{
    protected $table;
    protected $primaryKey = 'id';
    protected $foreignKey;
    protected $columns; 

    private $query = "";
    private $params;

    public function __construct()
    {        
        // check if table exists 
    
        // if not create table
    }

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
            $this->query .= $column;

            if ($i < $len - 1)
            {
                $this->query .= ", ";
                $i++;
            }
        }

        $this->query .= ") VALUES (";
       
        $j = 0;
        
        foreach ($data as $column => $value)
        {
            $this->query .= ":" . $column;

            if ($j < $len - 1)
            {
                $this->query .= ", ";
                $j++; 
            }
             
        }

        $this->query .= ")";

        $this->set($data);
    }

    public function update($data, $id)
    {
        $this->query = "UPDATE `" . $this->table . "` SET ";

        $i = 0;
        $len = count($data);

        foreach ($data as $column => $value)
        {
            $this->query .= $column . "=:" . $column;

            if ($i < $len - 1)
            {
                $this->query .= ", ";
                $i++;
            }
        }

        $this->query .= " WHERE " . $this->primaryKey . "=" . $id;

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
        // var_dump($this->query, $data);

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
                
        $this->query .= " FROM `" . $this->table . "`";
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
        
        $this->query .= " FROM `" . $this->table . "` WHERE `" . $this->primaryKey . "`=" . $id;
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
        
        $this->query .= " FROM `" . $this->table . "` WHERE ";
        
        $i = 0; // used to check last in for each loop
        $len = count($conditions);

        foreach ($conditions as $column => $condition)
        {
            $this->query .= " `" . $column . "`=:" . $column;

            if ($i < $len - 1) // not the last one in the loop
            {
                $this->query .= " AND ";
                $i++;
            }

            $this->params[$column] = $condition;
        }
        
        return $this;
    }

    public function orderBy($data)
    {
        $column = array_keys($data)[0];

        $this->query .= " ORDER BY `" . $column . "` " . $data[$column];

        // var_dump($data);
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
        $stmt->execute(($this->params? $this->params:null));

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
        // return new PDO( DB_TYPE . ': host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS );

        $conn = new PDO( DB_TYPE . ': host=' . DB_HOST . ';', DB_USER, DB_PASS );

        $conn->exec("CREATE DATABASE `" . DB_NAME . "`;");

        try {    
            return new PDO( DB_TYPE . ': host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS );
        } 
        catch (PDOExeption $e) {
            $conn = new PDO( DB_TYPE . ': host=' . DB_HOST . ';', DB_USER, DB_PASS );

            $conn->exec("CREATE DATABASE `" . DB_NAME . "`;");
            $conn = null;

            return new PDO( DB_TYPE . ': host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS );
        }




    } 

    private function selectColumns($columns)
    {
        $i = 0; // used to check last in for each loop
        $len = count($columns);

        foreach ($columns as $column)
        {
            $this->query .= $column;

            if ($i < $len - 1) // not the last one in the loop
            {
                $this->query .= ", ";
                $i++;
            }
        }
    }
}