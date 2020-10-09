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

        foreach ($tasks as $task)
        {
            $allTasks[] = $task;
        }

        $allTasks = $this->unique_multidim_array($allTasks, 'status');

        return $this->view('index', ['lists' => $lists, 'tasks' => $tasks, 'allTasks' => $allTasks]);
    }
}

?>