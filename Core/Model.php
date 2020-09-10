<?php

class Model
{
    protected $table;
    protected $primaryKey = 'id';
    protected $foreignKey;

    private $query;

    /* 
     * Gets all the data from this table
     * columns array not yet implemented
     */
    public static function all($columns = ['*'])
    {
        self::$query = "SELECT * FROM " . self::$table; 
        self::get();
    }

    /*
     * Finds the ... with this id
     * columns array not yet implemented 
     */
    public static function find($id, $columns = ['*'])
    {
        self::$query = "SELECT * FROM" . self::$table . "WHERE " . self::$primaryKey . " " . $id;
        self::get();
    }


    public static function get()
    {
        // create connection
        $dbh = self::DBConnect();
        // create query

        // get data

        // close connection 

        // return data;
    }


    protected function DBConnect()
    {
        // create connection with constants defined in config
        return new PDO( DB_TYPE . ': host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS );
    } 
}