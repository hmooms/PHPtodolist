<?php 

use Models\TodoList;
use Models\Task;

use Core\Controller;

class TodoListController extends Controller
{
    public function create()
    {
        return $this->view('list.create');
    }

    public function store($data)
    {
        $list = new TodoList;
        $list->store([
            'name' => $data['name'],
        ]); 

        return $this->redirect(); // home page
    }

    public function sort($data)
    {
        $listObj = new TodoList;
        $lists = $listObj->all();

        $taskObj = new Task;
        $allTasks = $taskObj->all();
        $tasks = $taskObj->where([
            'status' => $data['status']
        ])->get();


        $allTasks = $this->unique_multidim_array($allTasks, 'status');

        return $this->view('index', ['lists' => $lists, 'tasks' => $tasks, 'allTasks' => $allTasks]);
    }

    public function orderBy($data)
    {
        $listObj = new TodoList;
        $lists = $listObj->all();

        $taskObj = new Task;
        $tasks = $taskObj->all();
        $orderedTasks = $taskObj->where(['list_id' => $data['id']])->orderBy(['duration' => $data['direction']])->get();

        foreach ($tasks as $key => $task)
        {
            if ($task['list_id'] == $data['id'])
            {
                unset($tasks[$key]);
            }
        } 
        foreach ($orderedTasks as $orderedTask)
        {
            $tasks[] = $orderedTask;
        }

        $allTasks = $this->unique_multidim_array($tasks, 'status');


        return $this->view('index', ['lists' => $lists, 'tasks' => $tasks, 'direction' => $data['direction'], 'allTasks' => $allTasks]);
    }


    public function edit($data)
    {
        $listObj = new TodoList;
        $list = $listObj->find($data['id']);

        return $this->view('list.edit', ['list' => $list]);
    }

    public function update($data)
    {
        $list = new TodoList;

        $list->update([
            'name' => $data['name'],
        ], $data['id']);

        return $this->redirect();
    }
    public function delete($data)
    {
        $list = new TodoList;
        $list->delete($data);

        $taskObj = new Task; 
        $tasks = $taskObj->where(['list_id' => $data['id']])->get();
        
        foreach ($tasks as $task)
        {
            $taskObj->delete(['id' => $task['id']]);
        }
        

        return $this->redirect();
    }
    
}
?>