<?php

namespace Models;

use Core\Model;

class Task extends Model
{
    protected $table = 'tasks';
    protected $foreignKey = 'list_id';
}