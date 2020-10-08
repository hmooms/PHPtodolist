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
        $tasks = $taskObj->all();
        $sortedTasks = $taskObj->where([
            'list_id' => $data['id'],
            'status' => $data['status']
        ])->get();


        return $this->view('index', ['lists' => $lists, 'tasks' => $tasks, 'SortedTasks' => $sortedTasks]);
    }

    public function orderBy($data)
    {
        $listObj = new TodoList;
        $lists = $listObj->all();

        $taskObj = new Task;
        $tasks = $taskObj->all();
        $orderedTasks = $taskObj->where(['list_id' => $data['id']])->orderBy(['duration' => $data['direction']])->get();

        return $this->view('index', ['lists' => $lists, 'tasks' => $tasks, 'orderedTasks' => $orderedTasks, 'direction' => $data['direction']]);
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