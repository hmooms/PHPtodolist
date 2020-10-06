<?php 

use Models\Task;
use Models\TodoList;

use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $listObj = new TodoList;
        $lists = $listObj->all();

        $taskObj = new Task;
        $tasks = $taskObj->all();

        return $this->view('index', ['lists' => $lists, 'tasks' => $tasks]);
    }
}

?>