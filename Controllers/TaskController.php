<?php

require(ROOT . 'Models/Task.php');
require(ROOT . 'Models/TodoList.php');

class TaskController extends Controller
{

    public function create($data)
    {
        $listObj = new TodoList;
        $list = $listObj->find($data['list-id']);

        return $this->view('task.create', ['list' => $list]);
    }

    public function store($data)
    {
        // need validation i think but i dont know how yet...
        $task = new Task;
        $task->store([
            'name' => $data['name'],
            'list-id' => $data['list-id']
        ]);

        // redirect to /phptodolist/
    }
    
    public function edit($data)
    {
        echo "Here you can edit task " . $data['task-id'] . " from list " . $data['list-id'] . ".<br>";
        
        $taskObj = new Task;
        $tasks = $taskObj->all();
        $tasksList2 = $taskObj->where(['list-id' => '2'])->get();


        $listObj = new TodoList;
        $list = $listObj->find($data['list-id']);
        // $tasks = Task::find($data['task-id']);
        // $list = List::find($data['list-id']);
        
        return $this->view('task.edit', ['tasks' => $tasks, 'list' => $list, 'task list 2' => $tasksList2]);
        
        /* how i want to be able to do it
        $task = Task::find($data['task-id']);
        $list = TodoList::find($data['list-id']) 

        return $this->view('list.edit', ['task' => $task, 'list' => $list];
        */
    }

    public function update($data)
    {
        // code
        echo $data['something'];

        $task = new Task;

        $task->update([
        'name' => $data['name'],

        
        ]);
        // update
        // redirect


    }
}