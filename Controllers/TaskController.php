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
        // need validation i think but i dont know how yet...its not important at the moment
        $task = new Task;
        $task->store([
            'name' => $data['name'],
            'description' => $data['description'],
            'list_id' => $data['list_id'],
        ]);

        return $this->redirect('/'); // homepage 
    }
    
    public function edit($data)
    {        
        $taskObj = new Task;
        $tasks = $taskObj->all();
        $tasksList2 = $taskObj->where(['list-id' => '2'])->get();


        $listObj = new TodoList;
        $list = $listObj->find($data['list-id']);
        
        return $this->view('task.edit', ['tasks' => $tasks, 'list' => $list, 'task list 2' => $tasksList2]);
    }

    public function update($data)
    {
        // code

        $task = new Task;

        $task->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'list_id' => $data['list_id'],
        ], $data['id']);
        // update
        // redirect


    }
}