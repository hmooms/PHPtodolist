<?php

namespace Models;

use Core\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $foreignKey = 'list_id';
    protected $columns = [
        "id INT( 11 ) AUTO_INCREMENT PRIMARY KEY",
        "name VARCHAR( 50 ) NOT NULL",
        "description VARCHAR( 250 ) NOT NULL",
        "status VARCHAR( 50 ) NOT NULL",
        "duration INT( 11 ) NOT NULL;" 
    ];

}