<?php

class Model
{
    protected $table;
    protected $primaryKey = 'id';
    protected $foreignKey;


    /* 
     * Gets all the data from this table
     */
    public static function all()
    {
        self::DBConnect(); // use db class probably idk
        $query = "SELECT * FROM " . self::$table;
    }

    /*
     * Finds the ... with this id 
     */
    public static function find($id)
    {
        self::DBConnect();
        $query = "SELECT * FROM" . self::$table . "WHERE " . self::$primaryKey . " " . $id;
    }

    protected function DBConnect()
    {

    } 

    public static function get()
    {
        
    }
}