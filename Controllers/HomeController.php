<?php 

require(ROOT . 'Models/Task.php');
require(ROOT . 'Models/TodoList.php');

class HomeController extends Controller
{
    public function index()
    {
        $listObj = new TodoList;
        $lists = $listObj->all();

        $taskObj = new Task;
        $tasks = $taskObj->all();

        return $this->view('index');
    }
}

?>