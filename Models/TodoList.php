<?php

namespace Models;

use Core\Model;

class TodoList extends Model
{
    protected $table = 'lists';
    protected $columns = [
        "id INT ( 11 ) AUTO_INCREMENT PRIMARY KEY",
        "name VARCHAR ( 50 ) NOT NULL;"
    ];
}